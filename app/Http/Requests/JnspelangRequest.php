<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JnspelangRequest extends FormRequest
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
            'jns' => 'required',
            'point' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'jns.required' => 'Nama jenis pelanggaran tidak boleh kosong...',
            'point.required' => 'Point pelanggaran tidak boleh kosong...'
        ];
    }
}
