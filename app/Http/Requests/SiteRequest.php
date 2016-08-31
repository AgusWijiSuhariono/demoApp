<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SiteRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tanggal' => 'required',
            'judul' => 'required|min:10',
            'isi' => 'required|string',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tanggal.required' => 'Tanggal tidak boleh kosong broo',
            'judul.min' => 'Untuk Judul minimal 10 Karakter coy',

        ];
    }
}
