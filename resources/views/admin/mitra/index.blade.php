@extends('admin.layout')

@section('title', 'Kelola Mitra')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div>
            <p class="admin-kicker">Partner management</p>
            <h1>Kelola mitra</h1>
            <p class="admin-intro">Tambah dan ubah mitra yang akan ditampilkan di halaman beranda.</p>
        </div>
        <a class="admin-button admin-button-link" href="{{ route('admin.mitra.create') }}">+ Mitra baru</a>
    </header>

    @if (session('status'))
        <div class="admin-success" role="status">{{ session('status') }}</div>
    @endif

    <div class="admin-list-summary"><span>{{ $mitra->total() }} mitra</span></div>
    <section class="admin-table-wrap" aria-label="Daftar mitra">
        <table class="admin-table">
            <thead><tr><th>Nama</th><th>Logo</th><th>Dibuat</th><th class="admin-table-actions">Aksi</th></tr></thead>
            <tbody>
                @forelse ($mitra as $item)
                    <tr>
                        <td class="admin-cell-main"><strong>{{ $item->nama }}</strong></td>
                        <td data-label="Logo">{{ $item->image ? 'Tersedia' : 'Belum ada' }}</td>
                        <td data-label="Dibuat">{{ $item->created_at->format('d M Y') }}</td>
                        <td class="admin-table-actions">
                            <a class="admin-action-link" href="{{ route('admin.mitra.edit', $item) }}">Edit</a>
                            <form class="admin-inline-form" method="POST" action="{{ route('admin.mitra.destroy', $item) }}" onsubmit="return confirm('Hapus mitra ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="admin-action-link admin-action-danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="admin-empty"><strong>Belum ada mitra</strong>Tambahkan mitra pertama untuk disiapkan pada halaman beranda.</td></tr>
                @endforelse
            </tbody>
        </table>
    </section>
    <div class="admin-pagination">{{ $mitra->links() }}</div>
</div>
@endsection
