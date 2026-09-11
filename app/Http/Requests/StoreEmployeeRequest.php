<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\pL\s\'\-]+$/u',
            ],
            'last_name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\pL\s\'\-]+$/u',
            ],
            'company_id' => ['required', 'exists:companies,id'],
            'email' => [
                'nullable',
                'string',
                'max:255',
                'email:rfc,dns',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,10}$/',
            ],
            'phone' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^(\+?60|0)[0-9]{8,11}$/',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.regex' => 'The first name must not contain numbers or special characters.',
            'last_name.regex' => 'The last name must not contain numbers or special characters.',
            'email.email' => 'The email address domain does not exist or is invalid.',
            'email.regex' => 'The email address must be a valid email (e.g., name@domain.com).',
            'phone.regex' => 'The phone number must be a valid numeric phone number (e.g., 0187858049).',
        ];
    }
}
