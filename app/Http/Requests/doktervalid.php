<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class doktervalid extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // return false;
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
            'jenis_kelamin'=> 'required',
            'NIK' => 'required|min:20',
            'nomor_str'=> 'nullable|min:20',
            'email'=> 'unique:dokter,email',
            'telpon'=> 'required|min:8',
            'tanggal_lahir'=> 'required',
            'spesialis'=> 'required',
            'universitas'=> 'required',
            'agama'=> 'required',
            'alamat'=> 'nullable|required',
            'foto'=> 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'nama Tidak Boleh Kosong',
            'NIK.required' => 'NIK tidak boleh kosong',
            'NIK.required' => 'NIK harus 20 karakter',
        ];
    }
}
