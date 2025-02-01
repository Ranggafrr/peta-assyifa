<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataKabupatenKotaRequest extends FormRequest
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
            'kode_kabupaten_kota' => 'required|string|max:100', // Maksimal 100 karakter
            'nama_kabupaten_kota' => 'required|string',
            'kode_propinsi' => 'required|string|max:100', // Maksimal 100 karakter
            'created_by' => 'nullable|string|max:20', // Maksimal 20 karakter
            'remark' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nama_kabupaten_kota.required' => 'Nama Pendidikan harus diisi.',
            'nama_kabupaten_kota.string' => 'Nama Pendidikan tidak boleh mengandung angka.',
            'nama_kabupaten_kota.max' => 'Nama Pendidikan maksimal 100 karakter.',
        ];
    }
}
