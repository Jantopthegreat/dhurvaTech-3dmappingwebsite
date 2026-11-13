<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => trim((string) $this->input('name')),
            'email' => trim((string) $this->input('email')),
            'no_hp' => trim((string) $this->input('no_hp')),
            'alamat' => trim((string) $this->input('alamat')),
        ]);
    }

    public function rules(): array
    {
        $messageRules = $this->routeIs('admin.contact.*')
            ? ['nullable', 'string', 'max:5000']
            : ['required', 'string', 'max:5000'];

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'no_hp' => ['required', 'string', 'max:13'],
            'alamat' => ['required', 'string', 'max:255'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nama',
            'email' => 'email',
            'no_hp' => 'nomor WhatsApp',
            'alamat' => 'alamat' 
       ];
    }
}
