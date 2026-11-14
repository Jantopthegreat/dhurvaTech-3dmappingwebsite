@extends('admin.layout')

@section('title', 'Mitra Baru')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div><a class="admin-back-link" href="{{ route('admin.mitra.index') }}">← Kembali ke mitra</a><h1>Tambah mitra</h1></div>
    </header>
    <section class="admin-editor-panel">
        <form method="POST" action="{{ route('admin.mitra.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.mitra._form')
        </form>
    </section>
</div>
@endsection
