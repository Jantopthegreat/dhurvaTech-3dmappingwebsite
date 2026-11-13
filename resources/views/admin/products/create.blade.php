@extends('admin.layout')

@section('title', 'Produk Baru')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div><a class="admin-back-link" href="{{ route('admin.products.index') }}">← Kembali ke katalog</a><h1>Tambah produk</h1></div>
    </header>
    <section class="admin-editor-panel">
        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.products._form')
        </form>
    </section>
</div>
@endsection
