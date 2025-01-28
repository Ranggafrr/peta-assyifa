<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PekerjaanRequest extends FormRequest
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
            'nama_pekerjaan' => 'required|string|max:100', // Maksimal 100 karakter
            'status_pekerjaan' => 'required|string',
            'tingkat_pendidikan' => 'required|string',
            'created_by' => 'nullable|string|max:20', // Maksimal 20 karakter
            'remark' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nama_pekerjaan.required' => 'Nama Pekerjaan harus diisi.',
            'nama_pekerjaan.string' => 'Nama Pekerjaan tidak boleh mengandung angka.',
            'nama_pekerjaan.max' => 'Nama Pekerjaan maksimal 100 karakter.',
        ];
    }
}
