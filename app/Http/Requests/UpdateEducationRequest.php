<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class UpdateEducationRequest extends FormRequest
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
        $id = Route::input('education');
        return [
            'education' => ['required', 'max:150', Rule::unique('education', 'education')->ignore($id)],
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
