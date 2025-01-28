<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendidikanRequest extends FormRequest
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
            'nama_pendidikan' => 'required|string|max:100', // Maksimal 100 karakter
            'tingkat_pendidikan' => 'required|string',
            'akreditasi' => 'required|string',
            'created_by' => 'nullable|string|max:20', // Maksimal 20 karakter
            'remark' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nama_pendidikan.required' => 'Nama Pendidikan harus diisi.',
            'nama_pendidikan.string' => 'Nama Pendidikan tidak boleh mengandung angka.',
            'nama_pendidikan.max' => 'Nama Pendidikan maksimal 100 karakter.',
        ];
    }
}
