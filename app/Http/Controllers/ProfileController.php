<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        return view('profile.index', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update authenticated user data
     *
     * @param  \App\Http\Requests\UpdateProfileRequest $request
     * @param  int  $id 
     * @return RedirectResponse
     */
    public function update(UpdateProfileRequest $request, $id): RedirectResponse
    {
        $user = Auth::user();

        $user->update([
            'nama' => $request->nama,
            'username' => $request->username
        ]);

        return $this->redirectRoute($user);
    }


    /**
     * Redirect route based on condition.
     *
     * @param  \App\Models\User $user
     * @param  String $route
     * @param  String $successMsg
     * @param  String $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        User $user,
        String $route = 'profil.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($user) {
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
