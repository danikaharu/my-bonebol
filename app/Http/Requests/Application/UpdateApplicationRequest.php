<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationRequest extends FormRequest
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
            'agency_id' => ['required', 'exists:agencies,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'min:3', 'max:255'],
            'short_name' => ['nullable', 'min:3', 'max:255'],
            'url' => ['required', 'min:3', 'max:255'],
            'service_type' => ['required', 'in:1,2'],
            'service_area' => ['required', 'in:1,2'],
            'status' => ['required', 'in:1,2'],
        ];
    }

    public function messages(): array
    {
        return [
            'agency_id.required' => 'Instansi harus dipilih',
            'agency_id.exists' => 'Instansi tidak ada dalam daftar',
            'category_id.required' => 'Kategori aplikasi harus dipilih',
            'category_id.exists' => 'Kategori aplikasi tidak ada dalam daftar',
            'name.required' => 'Nama aplikasi tidak boleh kosong',
            'name.min' => 'Nama aplikasi minimal 3 huruf',
            'name.max' => 'Nama aplikasi maksimal 255 huruf',
            'short_name.required' => 'Singkatan aplikasi tidak boleh kosong',
            'short_name.min' => 'Singkatan aplikasi minimal 3 huruf',
            'short_name.max' => 'Singkatan aplikasi maksimal 255 huruf',
            'url.required' => 'Url aplikasi tidak boleh kosong',
            'url.min' => 'Url aplikasi minimal 3 huruf',
            'url.max' => 'Url aplikasi maksimal 255 huruf',
            'service_type.required' => 'Jenis layanan harus dipilih',
            'service_type.in' => 'Jenis layanan tidak ada dalam daftar',
            'service_area.required' => 'Wilayah layanan harus dipilih',
            'service_area.in' => 'Wilayah layanan tidak ada dalam daftar',
            'status.required' => 'Status harus dipilih',
            'status.in' => 'Status tidak ada dalam daftar',
        ];
    }
}
