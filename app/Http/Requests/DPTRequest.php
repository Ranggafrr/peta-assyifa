<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DPTRequest extends FormRequest
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
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P', // Hanya boleh 'L' atau 'P'
            'tanggal_lahir' => 'required', // Harus sebelum hari ini
            'dusun_jalan_alamat' => 'nullable|string', // karakter
            'rt' => 'nullable|max:20', // max 20
            'rw' => 'nullable|max:20', // max 20
            'desa_kelurahan' => 'nullable|string', // Maksimal 20 karakter
            'kecamatan' => 'nullable|string', // Maksimal 20 karakter
            'kabupaten' => 'nullable|string', // Maksimal 20 karakter
            'propinsi' => 'nullable|string', // Maksimal 20 karakter
            'tps' => 'nullable|string', // Maksimal 20 karakter
            'remark' => 'nullable', // Maksimal 20 karakter
            'nik' => 'nullable|string|min:16|max:16', // Harus 16 karakter
            'nomor_hp' => 'nullable|string|max:50|regex:/^[0-9]{10,15}$/', // Format nomor telepon
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama lengkap wajib diisi',
            'nama.string' => 'Nama lengkap tidak boleh mengandung angka',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
            'nik.min' => 'NIK harus 16 digit',
            'nik.max' => 'NIK harus 16 digit',
        ];
    }
}
