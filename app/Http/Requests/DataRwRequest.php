<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataRwRequest extends FormRequest
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
            'kode_rw' => 'required|string|max:100', // Maksimal 100 karakter
            'nama_rw' => 'required|string',
            'kode_desa' => 'required|string|max:100',
            'created_by' => 'nullable|string|max:20', // Maksimal 20 karakter
            'remark' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nama_rw.required' => 'Nama rw harus diisi.',
            'nama_rw.string' => 'Nama rw tidak boleh mengandung angka.',
            'nama_rw.max' => 'Nama rw maksimal 100 karakter.',
        ];
    }
}
