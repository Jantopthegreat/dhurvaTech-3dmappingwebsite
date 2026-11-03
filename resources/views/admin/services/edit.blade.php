@extends('admin.layout')

@section('title', 'Edit Layanan')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div><a class="admin-back-link" href="{{ route('admin.services.index') }}">← Kembali ke layanan</a><h1>Edit layanan</h1><p class="admin-intro">{{ $service->judul }}</p></div>
    </header>
    @if (session('status'))
        <div class="admin-success" role="status">{{ session('status') }}</div>
    @endif
    <section class="admin-editor-panel">
        <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.services._form', ['service' => $service])
        </form>
    </section>
</div>
@endsection
