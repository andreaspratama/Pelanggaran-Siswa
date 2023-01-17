<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubkelasRequest extends FormRequest
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
            'sub' => 'required',
            'kelas_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'sub.required' => 'Nama sub kelas tidak boleh kosong...',
            'kelas_id.required' => 'Nama kelas tidak boleh kosong...'
        ];
    }
}
