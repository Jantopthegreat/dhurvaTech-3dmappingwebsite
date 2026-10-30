<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

class AdminBlogController extends Controller
{
    private const IMAGE_DIR = 'blog';
    private const IMAGE_DISK = 'public';
    private const PER_PAGE = 10;

    public function index(): View
    {
        $articles = Article::query()
            ->latest('published_at')
            ->latest('id')
            ->paginate(self::PER_PAGE)
            ->withQueryString();

        return view('admin.blog.index', compact('articles'));
    }

    public function create(): View
    {
        return view('admin.blog.create');
    }

    public function store(ArticleRequest $request): RedirectResponse
    {
        $data = $request->articleData();
        unset($data['image']); 

        $newImage = $this->storeImage($request);

        if ($newImage !== null) {
            $data['image'] = $newImage;
        }

        try {
            $article = Article::create($data);
        } catch (Throwable $e) {
            $this->deleteImage($newImage);

            throw $e;
        }

        return redirect()
            ->route('admin.blog.edit', $article)
            ->with('status', 'Artikel berhasil dibuat.');
    }

    public function edit(Article $blog): View
    {
        return view('admin.blog.edit', ['article' => $blog]);
    }

    public function update(ArticleRequest $request, Article $blog): RedirectResponse
    {
        $data = $request->articleData();
        unset($data['image']);
        $oldImage = $blog->image;
        $newImage = $this->storeImage($request);

        // Tanpa upload baru, kolom image tidak disentuh sehingga gambar lama tetap.
        if ($newImage !== null) {
            $data['image'] = $newImage;
        }

        try {
            $blog->update($data);
        } catch (Throwable $e) {
            $this->deleteImage($newImage);

            throw $e;
        }

        // Hapus gambar lama hanya setelah update sukses.
        if ($newImage !== null) {
            $this->deleteImage($oldImage);
        }

        return redirect()
            ->route('admin.blog.edit', $blog)
            ->with('status', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $blog): RedirectResponse
    {
        $image = $blog->image;

        $blog->delete();
        $this->deleteImage($image);

        return redirect()
            ->route('admin.blog.index')
            ->with('status', 'Artikel berhasil dihapus.');
    }

    private function storeImage(ArticleRequest $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $file = $request->file('image');

        if (! $file->isValid()) {
            throw ValidationException::withMessages([
                'image' => 'Upload gambar gagal: ' . $file->getErrorMessage(),
            ]);
        }

        $path = $file->store(self::IMAGE_DIR, self::IMAGE_DISK);

        if ($path === false) {
            throw ValidationException::withMessages([
                'image' => 'Gambar gagal disimpan ke storage. Periksa izin folder storage/app/public.',
            ]);
        }

        return $path;
    }

    private function deleteImage(?string $path): void
    {
        if ($path !== null && Storage::disk(self::IMAGE_DISK)->exists($path)) {
            Storage::disk(self::IMAGE_DISK)->delete($path);
        }
    }
}