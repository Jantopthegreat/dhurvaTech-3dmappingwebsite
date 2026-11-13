<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
{
    private const WORDS_PER_MINUTE = 200;

    /**
     * Akses sudah dijaga oleh middleware auth admin di route.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $title = trim((string) $this->input('title'));

        $this->merge([
            'title' => $title,
            'category' => trim((string) $this->input('category')),
            'slug' => Str::slug((string) ($this->input('slug') ?: $title)),
        ]);
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                // Saat edit, abaikan artikel yang sedang diubah.
                Rule::unique('articles', 'slug')->ignore($this->route('blog')),
            ],
            'category' => ['required', 'string', 'max:100'],
            'published_at' => ['required', 'date'],
            'excerpt' => ['required', 'string', 'max:1000'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
            'content' => ['required', 'string'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'title' => 'judul',
            'slug' => 'slug',
            'category' => 'kategori',
            'published_at' => 'tanggal terbit',
            'excerpt' => 'ringkasan',
            'image' => 'gambar',
            'content' => 'isi artikel',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'slug.unique' => 'Slug ini sudah dipakai artikel lain. Ubah judul atau isi slug secara manual.',
            'slug.required' => 'Slug tidak bisa dibuat dari judul ini. Isi slug secara manual dengan huruf atau angka.',
            'image.image' => 'File gambar harus berupa JPG, PNG, WEBP, atau GIF.',
            'image.max' => 'Ukuran gambar maksimal 5 MB.',
        ];
    }

    /**
     * Data siap disimpan ke model (tanpa gambar, gambar ditangani controller).
     *
     * @return array<string, mixed>
     */
    public function articleData(): array
    {
        $data = Arr::except($this->validated(), ['image']);

        $paragraphs = $this->paragraphs((string) $data['content']);

        $data['content'] = $paragraphs;
        return $data;
    }

    /**
     * Satu baris = satu paragraf; baris kosong dibuang.
     *
     * @return array<int, string>
     */
    private function paragraphs(string $content): array
    {
        $lines = preg_split('/\R/u', $content) ?: [];

        return array_values(array_filter(
            array_map('trim', $lines),
            static fn (string $line): bool => $line !== '',
        ));
    }

}