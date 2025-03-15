<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class OwnershipRequest extends FormRequest
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
        $id = $this->route('id') ?? $this->route('ownership');

        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'registration_number' => ['required', 'integer',  Rule::unique('ownership')->ignore($id)],
            'lat' => ['required', 'string', 'max:255'],
            'long' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'description.required' => 'O campo descrição é obrigatório.',
            'registration_number.required' => 'O campo número de registro é obrigatório.',
            'registration_number.unique' => 'O número de registro já cadastrado.',
            'lat.required' => 'O campo latitude é obrigatório.',
            'long.required' => 'O campo longitude é obrigatório.',
        ];
    }
}
