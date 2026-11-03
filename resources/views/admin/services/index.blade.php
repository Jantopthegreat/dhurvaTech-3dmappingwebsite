@extends('admin.layout')

@section('title', 'Kelola Layanan')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div>
            <p class="admin-kicker">Service management</p>
            <h1>Kelola layanan</h1>
            <p class="admin-intro">Tambah dan ubah layanan yang tampil di halaman publik.</p>
        </div>
        <a class="admin-button admin-button-link" href="{{ route('admin.services.create') }}">+ Layanan baru</a>
    </header>

    @if (session('status'))
        <div class="admin-success" role="status">{{ session('status') }}</div>
    @endif

    <div class="admin-list-summary"><span>{{ $services->total() }} layanan</span></div>
    <section class="admin-table-wrap" aria-label="Daftar layanan">
        <table class="admin-table">
            <thead><tr><th>Judul</th><th>Sub judul</th><th>Dibuat</th><th class="admin-table-actions">Aksi</th></tr></thead>
            <tbody>
                @forelse ($services as $service)
                    <tr>
                        <td class="admin-cell-main"><strong>{{ $service->judul }}</strong></td>
                        <td data-label="Sub judul">{{ $service->sub_judul }}</td>
                        <td data-label="Dibuat">{{ $service->created_at->format('d M Y') }}</td>
                        <td class="admin-table-actions">
                            <a class="admin-action-link" href="{{ route('admin.services.edit', $service) }}">Edit</a>
                            <form class="admin-inline-form" method="POST" action="{{ route('admin.services.destroy', $service) }}" onsubmit="return confirm('Hapus layanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="admin-action-link admin-action-danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="admin-empty"><strong>Belum ada layanan</strong>Tambahkan layanan pertama untuk menggantikan data contoh di halaman publik.</td></tr>
                @endforelse
            </tbody>
        </table>
    </section>
    <div class="admin-pagination">{{ $services->links() }}</div>
</div>
@endsection
