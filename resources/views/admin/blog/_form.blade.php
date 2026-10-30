@php
    $isEdit = isset($article);
    $currentImageUrl = null;
    if ($isEdit && $article->image) {
        $currentImageUrl = str_starts_with($article->image, 'images/blog/')
            ? \Illuminate\Support\Facades\Storage::disk('public')->url($article->image)
            : asset($article->image);
    }
@endphp

@if ($errors->any())
    <div class="admin-alert" role="alert">
        <strong>Artikel belum bisa disimpan</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="admin-editor-layout">
    <div class="admin-editor-main">
        <div class="admin-card">
            <div class="admin-editor-field @error('title') has-error @enderror">
                <label for="title">Judul artikel</label>
                <input id="title" name="title" type="text" class="admin-title-input" placeholder="Tulis judul yang jelas dan spesifik" value="{{ old('title', $article->title ?? '') }}" required>
                @error('title') <p class="admin-field-error">{{ $message }}</p> @enderror
            </div>

            <div class="admin-editor-field @error('excerpt') has-error @enderror">
                <label for="excerpt">Ringkasan</label>
                <textarea id="excerpt" name="excerpt" rows="3" placeholder="Satu atau dua kalimat yang tampil di daftar artikel" required>{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
                <div class="admin-field-meta"><span>Tampil di kartu artikel dan hasil pencarian.</span><span id="excerpt-count">0 karakter</span></div>
                @error('excerpt') <p class="admin-field-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-editor-field @error('content') has-error @enderror">
                <label for="content">Isi artikel <span>(satu paragraf per baris)</span></label>
                <textarea id="content" name="content" rows="12" class="admin-content-input" placeholder="Tulis paragraf pertama di sini. Tekan Enter untuk memulai paragraf baru." required>{{ old('content', $isEdit ? implode("\n", $article->content ?? []) : '') }}</textarea>
                <div class="admin-field-meta"><span id="content-paragraphs">0 paragraf</span><span id="content-words">0 kata</span></div>
                @error('content') <p class="admin-field-error">{{ $message }}</p> @enderror
            </div>
        </div>
    </div>

    <aside class="admin-editor-side" aria-label="Pengaturan artikel">
        <div class="admin-card">
            <h2 class="admin-card-title">Pengaturan terbit</h2>
            <div class="admin-editor-field @error('category') has-error @enderror">
                <label for="category">Kategori</label>
                <input id="category" name="category" type="text" value="{{ old('category', $article->category ?? '') }}" required>
                @error('category') <p class="admin-field-error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-editor-field @error('published_at') has-error @enderror">
                <label for="published_at">Tanggal terbit</label>
                <input id="published_at" name="published_at" type="date" value="{{ old('published_at', $isEdit ? $article->published_at->format('Y-m-d') : now()->format('Y-m-d')) }}" required>
                @error('published_at') <p class="admin-field-error">{{ $message }}</p> @enderror
            </div>
            <!-- <div class="admin-editor-field @error('read_time') has-error @enderror">
                <label for="read_time">Waktu baca</label>
                <input id="read_time" name="read_time" type="text" placeholder="5 min read" value="{{ old('read_time', $article->read_time ?? '') }}" required>
                @error('read_time') <p class="admin-field-error">{{ $message }}</p> @enderror
            </div> -->
        </div>

        <div class="admin-card">
            <h2 class="admin-card-title">URL dan gambar</h2>
            <div class="admin-editor-field @error('slug') has-error @enderror">
                <label for="slug">Slug <span>(opsional)</span></label>
                <input id="slug" name="slug" type="text" placeholder="otomatis dari judul" value="{{ old('slug', $article->slug ?? '') }}">
                <span class="admin-slug-preview" id="slug-preview"></span>
                @error('slug') <p class="admin-field-error">{{ $message }}</p> @enderror
            </div>
            <div class="admin-editor-field @error('image') has-error @enderror">
                <label for="image">Gambar utama <span>(JPG, PNG, WEBP, GIF; maksimal 5 MB)</span></label>
                <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp,image/gif">
                @if ($currentImageUrl)
                    <p class="admin-current-image-label">Gambar saat ini</p>
                    <img class="admin-image-preview is-visible" src="{{ $currentImageUrl }}" alt="Gambar {{ $article->title }}">
                @endif
                <img id="image-preview" class="admin-image-preview" alt="Pratinjau gambar baru">
                @error('image') <p class="admin-field-error">{{ $message }}</p> @enderror
            </div>
        </div>
    </aside>
</div>

<div class="admin-editor-actions">
    <a class="admin-back-link" href="{{ route('admin.blog.index') }}">Batal</a>
    <button class="admin-button" type="submit">Simpan artikel</button>
</div>

<script>
    (function () {
        var byId = function (id) { return document.getElementById(id); };
        var title = byId('title'), slug = byId('slug'), slugPreview = byId('slug-preview');
        var excerpt = byId('excerpt'), content = byId('content'), image = byId('image'), imagePreview = byId('image-preview');
        var slugTouched = slug.value.trim() !== '';
        function slugify(text) {
            return text.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
        }
        function renderSlug() {
            var value = slug.value.trim() || slugify(title.value);
            slugPreview.textContent = value ? '/' + value : '';
        }
        function renderCounts() {
            excerptCount.textContent = excerpt.value.length + ' karakter';
            var lines = content.value.split('\n').filter(function (line) { return line.trim() !== ''; });
            var words = content.value.trim() ? content.value.trim().split(/\s+/).length : 0;
            paragraphCount.textContent = lines.length + ' paragraf';
            wordCount.textContent = words + ' kata';
        }
        var excerptCount = byId('excerpt-count'), paragraphCount = byId('content-paragraphs'), wordCount = byId('content-words');
        function renderImage() {
            var file = image.files[0];
            if (!file) { imagePreview.classList.remove('is-visible'); imagePreview.removeAttribute('src'); return; }
            imagePreview.src = URL.createObjectURL(file);
        }
        title.addEventListener('input', function () { if (!slugTouched) { slug.value = slugify(title.value); } renderSlug(); });
        slug.addEventListener('input', function () { slugTouched = slug.value.trim() !== ''; renderSlug(); });
        excerpt.addEventListener('input', renderCounts);
        content.addEventListener('input', renderCounts);
        image.addEventListener('change', renderImage);
        imagePreview.addEventListener('load', function () { imagePreview.classList.add('is-visible'); });
        imagePreview.addEventListener('error', function () { imagePreview.classList.remove('is-visible'); });
        renderSlug(); renderCounts();
    }());
</script>
