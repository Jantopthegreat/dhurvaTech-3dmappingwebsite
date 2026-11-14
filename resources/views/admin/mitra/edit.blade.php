@extends('admin.layout')

@section('title', 'Edit Mitra')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div><a class="admin-back-link" href="{{ route('admin.mitra.index') }}">← Kembali ke mitra</a><h1>Edit mitra</h1><p class="admin-intro">{{ $mitra->nama }}</p></div>
    </header>
    @if (session('status'))
        <div class="admin-success" role="status">{{ session('status') }}</div>
    @endif
    <section class="admin-editor-panel">
        <form method="POST" action="{{ route('admin.mitra.update', $mitra) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.mitra._form', ['mitra' => $mitra])
        </form>
    </section>
</div>
@endsection
