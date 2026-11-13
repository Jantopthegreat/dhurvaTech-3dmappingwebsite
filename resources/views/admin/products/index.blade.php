@extends('admin.layout')

@section('title', 'Kelola Katalog')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div>
            <p class="admin-kicker">Catalog management</p>
            <h1>Kelola katalog</h1>
            <p class="admin-intro">Tambah dan ubah produk yang tampil di halaman katalog.</p>
        </div>
        <a class="admin-button admin-button-link" href="{{ route('admin.products.create') }}">+ Produk baru</a>
    </header>

    @if (session('status'))
        <div class="admin-success" role="status">{{ session('status') }}</div>
    @endif

    <div class="admin-list-summary"><span>{{ $products->total() }} produk</span></div>
    <section class="admin-table-wrap" aria-label="Daftar produk">
        <table class="admin-table">
            <thead><tr><th>Nama</th><th>Kategori</th><th>Jenis</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td class="admin-cell-main"><strong>{{ $product->name }}</strong></td>
                        <td data-label="Kategori">{{ $product->category }}</td>
                        <td data-label="Jenis">{{ $product->type === 'rent' ? 'Sewa' : 'Jual' }}</td>
                        <td class="admin-table-actions">
                            <a class="admin-action-link" href="{{ route('admin.products.edit', $product) }}">Edit</a>
                            <form class="admin-inline-form" method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="admin-action-link admin-action-danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="admin-empty"><strong>Belum ada produk</strong>Tambahkan produk pertama untuk ditampilkan di katalog.</td></tr>
                @endforelse
            </tbody>
        </table>
    </section>
    <div class="admin-pagination">{{ $products->links() }}</div>
</div>
@endsection
