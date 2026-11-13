@extends('admin.layout')

@section('title', 'Layanan Baru')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div><a class="admin-back-link" href="{{ route('admin.services.index') }}">← Kembali ke layanan</a><h1>Tambah layanan</h1></div>
    </header>
    <section class="admin-editor-panel">
        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.services._form')
        </form>
    </section>
</div>
@endsection
