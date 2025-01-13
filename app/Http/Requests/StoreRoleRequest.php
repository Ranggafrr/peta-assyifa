<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
            'role' => 'required',
            'status' => 'required',
            'remark' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'role.required' => "Nama role wajib diisi",
            'status.required' => "Pilih status terlebih dahulu",
        ];
    }
}
