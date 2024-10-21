<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class UpdateStatusRequest extends FormRequest
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
        $id = Route::input('status');
        return [
            'status' => ['required', 'max:150', Rule::unique('statuses', 'status')->ignore($id)],
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
             'status.required' => 'Status tidak boleh kosong',
             'status.max' => 'Status maksimal 150 karakter',
             'status.unique' => 'Status telah terdaftar',
             'description.required' => 'Deskripsi tidak boleh kosong',
         ];
     }
}
