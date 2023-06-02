<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3', 'max:255'],
            'icon' => ['required', 'max:1024', 'image'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama kategori tidak boleh kosong',
            'name.min' => 'Nama kategori minimal 3 huruf',
            'name.max' => 'Nama kategori maksimal 255 huruf',
            'description.required' => 'Nama kategori tidak boleh kosong',
            'description.min' => 'Nama kategori minimal 3 huruf',
            'description.max' => 'Nama kategori maksimal 255 huruf',
            'icon.required' => 'Icon kategori wajib diupload',
            'icon.max' => 'Icon kategori maksimal 1 MB',
            'icon.image' => 'File yang diupload bukan gambar',
        ];
    }
}
