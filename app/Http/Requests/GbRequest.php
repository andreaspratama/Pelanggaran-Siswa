<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GbRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required',
            'email' => 'required',
            'ttd' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong...',
            'email.required' => 'Email tidak boleh kosong...',
            'ttd.required' => 'Gambar tidak boleh kosong...',
            'ttd.image' => 'Harus berupa gambar tidak file...'
        ];
    }
}
