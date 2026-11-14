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
        $phone = preg_replace('/\D+/', '', (string) $this->input('no_hp'));

        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        } elseif (! str_starts_with($phone, '62')) {
            $phone = '62' . $phone;
        }

        $this->merge([
            'name' => trim((string) $this->input('name')),
            'email' => trim((string) $this->input('email')),
            'no_hp' => $this->formatPhone($phone),
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
            'email' => ['nullable', 'email', 'max:255'],
            'no_hp' => ['required', 'regex:/^\+62\s\d{3,4}\s\d{3,4}\s\d{3,4}$/'],
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

    public function messages(): array
    {
        return [
            'no_hp.regex' => 'Nomor WhatsApp harus menggunakan format +62 xxx xxxx xxxx.',
        ];
    }

    private function formatPhone(string $phone): string
    {
        if (! str_starts_with($phone, '62') || strlen($phone) < 10) {
            return '+' . $phone;
        }

        $localNumber = substr($phone, 2);

        return '+62 ' . implode(' ', array_filter([
            substr($localNumber, 0, 3),
            substr($localNumber, 3, 4),
            substr($localNumber, 7),
        ]));
    }
}
