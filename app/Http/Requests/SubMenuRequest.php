<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubMenuRequest extends FormRequest
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
            'kode_menu' => 'required',
            'nama_submenu' => 'required',
            'no_urut' => 'required',
            'route' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'kode_menu.required' => 'Kode menu wajib diisi',
            'nama_submenu.required' => 'Nama sub menu  wajib diisi',
            'no_urut.required' => 'Nomor urut wajib diisi',
            'route.required' => 'Rute menu wajib diisi',
        ];
    }
}
