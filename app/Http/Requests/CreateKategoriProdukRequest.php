<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateKategoriProdukRequest extends FormRequest
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
        return [
            'nama' => 'required|string|max:255|unique:kategori_produks,nama,' . (($this->kategori != null) ? $this->kategori->id : ''),
            'dapur_id' => 'required',
            'gambar' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
