<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataDesaRequest extends FormRequest
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
            'kode_desa' => 'required|string|max:100', // Maksimal 100 karakter
            'nama_desa' => 'required|',
            'kode_kecamatan' => 'required|string|max:100', // Maksimal 100 karakter
            'created_by' => 'nullable|string|max:20', // Maksimal 20 karakter
            'remark' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nama_desa.required' => 'Kode Desa harus diisi.',
            'nama_desa.string' => 'Nama Desa tidak boleh mengandung angka.',
            'nama_desa.max' => 'Kode Desa maksimal 20 karakter.',
        ];
    }
}
