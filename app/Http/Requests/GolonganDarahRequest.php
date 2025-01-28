<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GolonganDarahRequest extends FormRequest
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
            'golongan_darah' => 'required|string',
            'remark' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'golongan_darah.required' => 'Golongan darah harus diisi.',
            'golongan_darah.string' => 'Nama lengkap tidak boleh mengandung angka.'
        ];
    }
}
