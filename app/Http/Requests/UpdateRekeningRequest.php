<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRekeningRequest extends FormRequest
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
            'nama' => 'required|string|min:3|unique:rekenings,nama,' . $this->rekening->id,
            'nomor' => 'required|min:6|unique:rekenings,nomor,' . $this->rekening->id,
            'saldo' => 'required',
        ];
    }
}
