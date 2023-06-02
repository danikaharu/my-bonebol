<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:users,email'],
            'avatar' => ['nullable', 'max:1024', 'mimes:png,jpg,jpeg'],
            'password' =>  [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama minimal 3 huruf',
            'name.max' => 'Nama maksimal 255 huruf',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Diisi dengan alamat email yang valid',
            'email.unique' => 'Email sudah digunakan',
            'avatar.max' => 'Foto profil maksimal 1 MB',
            'avatar.mimes' => 'Foto profil menggunakan ekstensi png, jpg, atau jpeg',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
        ];
    }
}
