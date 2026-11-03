@extends('admin.layout')

@section('title', 'Kelola Kontak')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div>
            <p class="admin-kicker">Contact settings</p>
            <h1>Kontak WhatsApp</h1>
            <p class="admin-intro">Nomor WhatsApp dari data terbaru digunakan oleh formulir kontak publik.</p>
        </div>
        <a class="admin-button admin-button-link" href="{{ route('admin.contact.create') }}">+ Tambah kontak</a>
    </header>

    @if (session('status'))
        <div class="admin-success" role="status">{{ session('status') }}</div>
    @endif

    <div class="admin-list-summary"><span>{{ $contacts->total() }} data kontak</span></div>
    <section class="admin-table-wrap" aria-label="Daftar kontak WhatsApp">
        <table class="admin-table">
            <thead>
                <tr><th>Nama</th><th>Email</th><th>Nomor WhatsApp</th><th>Alamat</th><th>Dibuat</th><th class="admin-table-actions">Aksi</th></tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr>
                        <td class="admin-cell-main"><strong>{{ $contact->name }}</strong></td>
                        <td data-label="Email">{{ $contact->email }}</td>
                        <td data-label="Nomor WhatsApp">{{ $contact->no_hp }}</td>
                        <td data-label="Alamat">{{ $contact->alamat }}</td>
                        <td data-label="Dibuat">{{ $contact->created_at->format('d M Y H:i') }}</td>
                        <td class="admin-table-actions">
                            <div class="admin-row-actions">
                                <a class="admin-action-link" href="{{ route('admin.contact.edit', $contact) }}">Edit</a>
                                <form class="admin-inline-form" method="POST" action="{{ route('admin.contact.destroy', $contact) }}" onsubmit="return confirm('Hapus data kontak ini? Jika ini data terbaru, website akan memakai data kontak sebelumnya atau nomor default.')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="admin-action-link admin-action-danger" type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="admin-empty"><strong>Belum ada data kontak</strong>Tambahkan kontak agar nomor WhatsApp admin digunakan oleh website.</td></tr>
                @endforelse
            </tbody>
        </table>
    </section>
    <div class="admin-pagination">{{ $contacts->links() }}</div>
</div>
@endsection
