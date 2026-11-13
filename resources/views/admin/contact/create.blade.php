@extends('admin.layout')

@section('title', 'Pesan Kontak Baru')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div>
            <a class="admin-back-link" href="{{ route('admin.contact.index') }}">← Kembali ke kontak</a>
            <h1>Tambah kontak WhatsApp</h1>
        </div>
    </header>
    <section class="admin-editor-panel">
        <form method="POST" action="{{ route('admin.contact.store') }}">
            @csrf
            @include('admin.contact._form')
        </form>
    </section>
</div>
@endsection
