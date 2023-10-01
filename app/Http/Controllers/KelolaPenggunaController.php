<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelolaPenggunaRequest;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaPenggunaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kelolaPengguna.index', [
            'users' => User::all()->where('is_active', true),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelolaPengguna.create', [
            'roles' => RoleUser::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KelolaPenggunaRequest $request)
    {
        $kelolaPengguna = User::create([
            'role_id' => $request->roleId,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return $this->redirectRoute(kelolaPengguna: $kelolaPengguna);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('kelolaPengguna.edit', [
            "user" => User::find($id),
            "roles" => RoleUser::all()
        ]);
    }

   /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\KelolaPenggunaRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(KelolaPenggunaRequest $request, User $kelolaPengguna)
    {
        $kelolaPengguna->update([
            'role_id' => $request->roleId,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return $this->redirectRoute(kelolaPengguna: $kelolaPengguna);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelolaPengguna = User::findOrFail($id);
        $kelolaPengguna->is_active = false; 
        $kelolaPengguna->save();

        return $this->redirectRoute(kelolaPengguna: $kelolaPengguna);
    }

    /**
     * Redirect route based on condition.
     *
     * @param  mixed $kelolaPengguna
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        User $kelolaPengguna,
        String $route = 'kelolaPengguna.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($kelolaPengguna) {
            return redirect()
                ->route($route)
                ->with([
                    "success" => $successMsg
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    "error" => $errorMsg
                ]);
        }
    }
}
