@extends('admin.layout')

@section('title', 'Kelola Blog')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div>
            <p class="admin-kicker">Content management</p>
            <h1>Kelola artikel blog</h1>
            <p class="admin-intro">Buat, ubah, dan hapus artikel yang tampil di halaman publik.</p>
        </div>
        <a class="admin-button admin-button-link" href="{{ route('admin.blog.create') }}">+ Artikel baru</a>
    </header>

    @if (session('status'))
        <div class="admin-success" role="status">{{ session('status') }}</div>
    @endif

    <div class="admin-list-summary">
        <span>{{ $articles->total() }} artikel</span>
        @if ($articles->hasPages())
            <span>Halaman {{ $articles->currentPage() }} dari {{ $articles->lastPage() }}</span>
        @endif
    </div>

    <section class="admin-table-wrap" aria-label="Daftar artikel">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Artikel</th>
                    <th>Kategori</th>
                    <th>Terbit</th>
                    <th class="admin-table-actions">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                    <tr>
                        <td class="admin-cell-main">
                            <div class="admin-article-cell">
                                @if ($article->image)
                                    @php
                                        $thumbnailUrl = str_starts_with($article->image, 'blog/')
                                            ? \Illuminate\Support\Facades\Storage::disk('public')->url($article->image)
                                            : asset($article->image);
                                    @endphp
                                    <img class="admin-article-thumb" src="{{ $thumbnailUrl }}" alt="" loading="lazy">
                                @else
                                    <span class="admin-article-thumb admin-article-thumb-empty" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="9" cy="10" r="1.5"/><path d="m21 16-5-5-8 8"/></svg>
                                    </span>
                                @endif
                                <div>
                                    <a class="admin-article-title" href="{{ route('admin.blog.edit', $article) }}">{{ $article->title }}</a>
                                    <span class="admin-table-slug">/{{ $article->slug }}</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Kategori"><span class="admin-badge">{{ $article->category }}</span></td>
                        <!-- <td class="admin-date" data-label="Terbit">
                            {{ $article->published_at->format('d M Y') }}
                            <small>{{ $article->read_time }}</small>
                        </td> -->
                        <td class="admin-table-actions">
                            <div class="admin-row-actions">
                                <a class="admin-action-link" href="{{ route('admin.blog.edit', $article) }}">Edit</a>
                                <form class="admin-inline-form" method="POST" action="{{ route('admin.blog.destroy', $article) }}" onsubmit="return confirm('Hapus artikel &quot;{{ addslashes($article->title) }}&quot;? Tindakan ini tidak bisa dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="admin-action-link admin-action-danger" type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="admin-empty">
                            <strong>Belum ada artikel</strong>
                            Artikel yang kamu buat akan muncul di sini dan di halaman publik.
                            <br>
                            <a class="admin-button admin-button-link" href="{{ route('admin.blog.create') }}">Tulis artikel pertama</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>

    <div class="admin-pagination">{{ $articles->links() }}</div>
</div>
@endsection