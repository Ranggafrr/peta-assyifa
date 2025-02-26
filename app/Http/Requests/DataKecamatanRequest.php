<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataKecamatanRequest extends FormRequest
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
<<<<<<< HEAD
            'kode_kecamatan' => 'required|string|max:100', // Maksimal 100 karakter
            'nama_kecamatan' => 'required|',
            'kode_kabupaten_kota' => 'required|string|max:100', // Maksimal 100 karakter
=======
            'kode_kecamatan' => 'required|string', // Maksimal 100 karakter
            'nama_kecamatan' => 'required|string',
            'kode_kabupaten_kota' => 'required|string', // Maksimal 100 karakter
>>>>>>> a984a0b (fix import data)
            'created_by' => 'nullable|string|max:20', // Maksimal 20 karakter
            'remark' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
<<<<<<< HEAD
            'nama_kecamatan.required' => 'Nama Kecamatan harus diisi.',
            'nama_kecamatan.string' => 'Nama Kecamatan tidak boleh mengandung angka.',
            'nama_kecamatan.max' => 'Nama Kecamatan maksimal 20 karakter.',
=======
            'kode_kecamatan.required' => 'Kode kecamatan harus diisi.',
            'nama_kecamatan.required' => 'Nama kecamatan harus diisi.',
            'kode_kabupaten_kota.required' => 'Nama kecamatan harus diisi.',
>>>>>>> a984a0b (fix import data)
        ];
    }
}
