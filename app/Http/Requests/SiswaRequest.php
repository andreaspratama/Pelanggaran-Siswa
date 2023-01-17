<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
            'email' => 'required|email',
            'nisn' => 'required',
            'kelas_id' => 'required',
            'sub_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong...',
            'email.required' => 'Email tidak boleh kosong...',
            'email.email' => 'Harus format email...',
            'nisn.required' => 'Nisn tidak boleh kosong...',
            'kelas_id.required' => 'Kelas tidak boleh kosong...',
            'sub_id.required' => 'Sub kelas tidak boleh kosong...'
        ];
    }
}
