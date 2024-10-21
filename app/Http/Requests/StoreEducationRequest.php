<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
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
            'education' => 'required|max:150|unique:education,education',
            'description' => 'required',
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
             'education.required' => 'Pendidikan tidak boleh kosong',
             'education.max' => 'Pendidikan maksimal 150 karakter',
             'education.unique' => 'Pendidikan telah terdaftar',
             'description.required' => 'Deskripsi tidak boleh kosong',
         ];
     }
}
