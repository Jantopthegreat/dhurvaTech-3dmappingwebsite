@extends('admin.layout')

@section('title', 'Edit Pesan Kontak')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div>
            <a class="admin-back-link" href="{{ route('admin.contact.index') }}">← Kembali ke kontak</a>
            <h1>Edit kontak WhatsApp</h1>
            <p class="admin-intro">Diterima {{ $contact->created_at->format('d M Y H:i') }}</p>
        </div>
    </header>
    @if (session('status'))
        <div class="admin-success" role="status">{{ session('status') }}</div>
    @endif
    <section class="admin-editor-panel">
        <form method="POST" action="{{ route('admin.contact.update', $contact) }}">
            @csrf
            @method('PUT')
            @include('admin.contact._form', ['contact' => $contact])
        </form>
    </section>
</div>
@endsection
