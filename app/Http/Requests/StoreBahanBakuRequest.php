<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBahanBakuRequest extends FormRequest
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
            'nama' => 'required|string|min:3',
            'deskripsi' => 'string',
            'hargaBeli' => 'required',
            'stok' => 'required',
            'minimalStok' => 'required',
            'satuan' => 'string'
        ];
    }
}
