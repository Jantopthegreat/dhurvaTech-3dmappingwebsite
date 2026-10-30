@extends('admin.layout')

@section('title', 'Artikel Baru')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div>
            <a class="admin-back-link" href="{{ route('admin.blog.index') }}">← Kembali ke blog</a>
            <h1>Tambah artikel</h1>
            <p class="admin-intro">Isi konten di kolom kiri, atur kategori dan jadwal terbit di kolom kanan.</p>
        </div>
    </header>

    <section class="admin-editor-panel">
        <form class="admin-editor-form" method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.blog._form')
        </form>
    </section>
</div>
@endsection