@extends('admin.layout')

@section('title', 'Edit Produk')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div><a class="admin-back-link" href="{{ route('admin.products.index') }}">← Kembali ke katalog</a><h1>Edit produk</h1><p class="admin-intro">{{ $product->name }}</p></div>
    </header>
    @if (session('status'))
        <div class="admin-success" role="status">{{ session('status') }}</div>
    @endif
    <section class="admin-editor-panel">
        <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.products._form', ['product' => $product])
        </form>
    </section>
</div>
@endsection
