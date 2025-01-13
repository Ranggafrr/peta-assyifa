<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'nama_lengkap' => 'required|string',
            'role' => 'required',
            'email' => 'nullable|email', //opsional karena di set nullable
            'no_wa' => 'nullable|regex:/^[0-9]{10,15}$/', //opsional karena di set nullable
            'alamat' => 'nullable|string', //opsional karena di set nullable
        ];
    }
    public function messages(): array
    {
        return [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'role.required' => 'Role harus dipilih.',
        ];
    }
}
