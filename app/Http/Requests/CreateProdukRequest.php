<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // dd($this->produk);
        return [
            'nama' => 'required',
            'kode' => 'required|unique:produks,kode,' . (($this->produk != null) ? $this->produk->id : ''),
            'harga_jual' => 'required|numeric',
            'kategori_produk_id' => 'required|exists:kategori_produks,id',
            'gambar' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'stok' => 'required|numeric',
        ];
    }
}
