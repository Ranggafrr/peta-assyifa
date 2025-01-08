<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'kode_menu' => 'required|unique:master_menu,kode_menu',
            'modul' => 'required',
            'nama_menu' => 'required',
            'sub_menu' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'kode_menu.required' => 'Kode menu wajib diisi',
            'kode_menu.unique' => 'Kode menu ini sudah digunakan',
            'modul.required' => 'Pilih nama modul terlebih dahulu',
            'nama_menu.required' => 'Nama menu wajib diisi',
            'sub_menu.required' => 'Sub menu wajib diisi',
        ];
    }
}
