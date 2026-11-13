@extends('admin.layout')

@section('title', 'Edit Artikel')

@section('content')
<div class="blog-admin">
    <header class="admin-header admin-page-header">
        <div>
            <a class="admin-back-link" href="{{ route('admin.blog.index') }}">← Kembali ke blog</a>
            <h1>Edit artikel</h1>
            <p class="admin-intro">/{{ $article->slug }}</p>
        </div>
    </header>

    @if (session('status'))
        <div class="admin-success" role="status">{{ session('status') }}</div>
    @endif

    <section class="admin-editor-panel">
        <form class="admin-editor-form" method="POST" action="{{ route('admin.blog.update', $article) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.blog._form', ['article' => $article])
        </form>
    </section>
</div>
@endsection