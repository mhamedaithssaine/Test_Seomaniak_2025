<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:100'],
            'last_name'  => ['required', 'string', 'min:3', 'max:100'],
            'email'      => ['required', 'email', 'max:150', 'unique:contacts,email'],
            'phone'      => [
                'required',
                'string',
                'regex:/^(\+212[0-9]{9}|0[67][0-9]{8})$/',
            ],
            'notes'      => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Le prénom est obligatoire.',
            'first_name.min'     => 'Le prénom doit contenir au moins 3 caractères.',
            'first_name.max'     => 'Le prénom ne peut pas dépasser 100 caractères.',
            'last_name.required' => 'Le nom est obligatoire.',
            'last_name.min'      => 'Le nom doit contenir au moins 3 caractères.',
            'last_name.max'      => 'Le nom ne peut pas dépasser 100 caractères.',
            'email.required'    => "L'email est obligatoire.",
            'email.email'       => "L'adresse email n'est pas valide.",
            'email.unique'      => "Cet email est déjà utilisé.",
            'phone.required'    => 'Le téléphone est obligatoire.',
            'phone.regex'      => 'Le téléphone doit commencer par +212, 06 ou 07 et contenir 10 chiffres (ex: 0612345678, +212612345678).',
        ];
    }
}
