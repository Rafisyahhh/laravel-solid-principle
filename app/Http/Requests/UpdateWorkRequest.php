<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkRequest extends FormRequest
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
        $id = Route::input('work');
        return [
            'work' => ['required', 'max:150', Rule::unique('works', 'work')->ignore($id)],
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
             'work.required' => 'Pekerjaan tidak boleh kosong',
             'work.max' => 'Pekerjaan maksimal 150 karakter',
             'work.unique' => 'Pekerjaan telah terdaftar',
             'description.required' => 'Deskripsi tidak boleh kosong',
         ];
     }
}
