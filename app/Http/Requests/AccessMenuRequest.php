<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccessMenuRequest extends FormRequest
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
            'kode_menu' => [
                'required',
                Rule::unique('access_menu')->where(function ($query) {
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
            'kode_menu.required' => 'Pilih menu terlebih dahulu',
            'kode_menu.unique' => 'Akses role pada menu ini sudah ada',
            'status.required' => 'Pilih status terlebih dahulu',
        ];
    }
}
