<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModulRequest extends FormRequest
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
            'modul' => 'required',
            'no_urut' => 'required|unique:master_modul,no_urut',
            'status' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'modul.required' => 'Modul wajib diisi',
            'no_urut.required' => 'Nomor urut wajib diisi',
            'no_urut.unique' => 'Nomor urut sudah digunakan, mohon gunakan angka lain',
            'status.required' => "Pilih status terlebih dahulu",
        ];
    }
}
