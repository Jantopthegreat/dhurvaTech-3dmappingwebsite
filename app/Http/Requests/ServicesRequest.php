<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
{
     public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $content = $this->input('content');

        // Kalau form mengirim content sebagai string JSON (textarea), ubah jadi array
        if (is_string($content)) {
            $decoded = json_decode($content, true);
            $content = json_last_error() === JSON_ERROR_NONE && is_array($decoded)
                ? $decoded
                : (preg_split('/\R/u', $content) ?: []);
        }

        $this->merge([
            'judul'           => trim((string) $this->input('judul')),
            'sub_judul'       => trim((string) $this->input('sub_judul')),
            'judul_deskripsi' => trim((string) $this->input('judul_deskripsi')),
            'deskripsi'       => trim((string) $this->input('deskripsi')),
            'judul_point'     => trim((string) $this->input('judul_point')),
            'point'           => trim((string) $this->input('point')),
            'content'         => array_values(array_filter(array_map('trim', $content), static fn (string $item): bool => $item !== '')),
        ]);
    }

    public function rules(): array
    {
        return [
            'judul'           => ['required', 'string', 'max:255'],
            'sub_judul'       => ['required', 'string', 'max:255'],
            'judul_deskripsi' => ['required', 'string', 'max:255'],
            'deskripsi'       => ['required', 'string', 'max:5000'],
            'judul_point'     => ['required', 'string', 'max:255'],
            'point'           => ['required', 'string', 'max:5000'],
            'image'           => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'content'         => ['required', 'array'],
            'content.*'       => ['nullable'],
        ];
    }

    public function attributes(): array
    {
        return [
            'judul'           => 'judul',
            'sub_judul'       => 'sub judul',
            'judul_deskripsi' => 'judul deskripsi',
            'deskripsi'       => 'deskripsi',
            'judul_point'     => 'judul point',
            'point'           => 'point',
            'image'           => 'gambar',
            'content'         => 'konten',
        ];
    }
}
