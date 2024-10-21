<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResidentRequest extends FormRequest
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
            'name' => 'required',
            'place_birth' => 'required',
            'date_birth' => 'required',
            'gender' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg',
            'address_id' => 'required',
            'education_id' => 'required',
            'work_id' => 'required',
            'status_id' => 'required',
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
            'name.required' => 'Nama tidak boleh kosong',
            'place_birth.required' => 'Tempat Lahir tidak boleh kosong',
            'date_birth.required' => 'Tanggal Lahir tidak boleh kosong',
            'gender.required' => 'Jenis Kelamin tidak boleh kosong',
            'foto.required' => 'Foto tidak boleh kosong',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format file gambar harus jpeg, png, atau jpg',
            'address_id.required' => 'Alamat tidak boleh kosong',
            'education_id.required' => 'Pendidikan tidak boleh kosong',
            'work_id.required' => 'Pekerjaan tidak boleh kosong',
            'status_id.required' => 'Status tidak boleh kosong',
        ];
    }
}
