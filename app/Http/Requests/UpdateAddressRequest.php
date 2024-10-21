<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class UpdateAddressRequest extends FormRequest
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
        $id = Route::input('address');
        return [
            'address' => ['required', 'max:150', Rule::unique('addresses', 'address')->ignore($id)],
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
             'address.required' => 'Alamat RT tidak boleh kosong',
             'address.max' => 'Alamat RT maksimal 150 karakter',
             'address.unique' => 'Alamat RT telah terdaftar',
             'description.required' => 'Deskripsi tidak boleh kosong',
         ];
     }
}
