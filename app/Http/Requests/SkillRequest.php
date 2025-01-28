<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
            'nama_skill' => 'required|string|max:100', // Maksimal 100 karakter
            'created_by' => 'nullable|string|max:20', // Maksimal 20 karakter
            'remark' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_skill.required' => 'Nama skill harus diisi.',
            'nama_skill.string' => 'Nama skill tidak boleh mengandung angka.',
            'nama_skill.max' => 'Nama skill maksimal 100 karakter.',
            'created_by.string' => 'Created by tidak boleh mengandung angka.',
            'created_by.max' => 'Created by maksimal 20 karakter.',
        ];
    }
}
