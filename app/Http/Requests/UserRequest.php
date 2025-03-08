<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatorio',
            'email.required' => 'O campo email é obrigatorio',
            'email.unique' => 'O email ja cadastrado',
            'password.min' => 'O campo senha deve ter no minimo 8 caracteres',
            'password.required' => 'O campo senha é obrigatorio',
        ];
    }
}
