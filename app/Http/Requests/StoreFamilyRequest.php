<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFamilyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'no_kk' => 'required|max:150|unique:families,no_kk',
            'head_family' => 'required',
            'address_id' => 'required',
        ];
    }

    /**
     * Custom Validation Messages
     *
     * @return array<string, mixed>
     */

     public function messages(): array
     {
         return [
             'no_kk.required' => 'Nomer Kartu Keluarga tidak boleh kosong',
             'no_kk.max' => 'Nomer Kartu Keluarga maksimal 150 karakter',
             'no_kk.unique' => 'Nomer Kartu Keluarga telah terdaftar',
             'head_family.required' => 'Nama Kepala Keluarga tidak boleh kosong',
             'address_id.required' => 'Alamat tidak boleh kosong',
         ];
     }
}
