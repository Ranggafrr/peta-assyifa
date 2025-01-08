<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class AccessSubMenuRequest extends FormRequest
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
            'role_id' => ['required'],
            'kode_submenu' => [
                'required',
                Rule::unique('access_submenu')->where(function ($query) {
                    return $query->where('role_id', $this->role_id);
                }),
            ],
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'role_id.required' => 'Pilih role terlebih dahulu',
            'kode_submenu.required' => 'Pilih menu terlebih dahulu',
            'kode_submenu.unique' => 'Akses role pada menu ini sudah ada',
            'status.required' => 'Pilih status terlebih dahulu',
        ];
    }
}
