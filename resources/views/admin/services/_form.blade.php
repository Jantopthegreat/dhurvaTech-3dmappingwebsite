@if ($errors->any())
    <div class="admin-alert" role="alert">
        <strong>Layanan belum bisa disimpan</strong>
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="admin-editor-grid">
    <div class="admin-editor-field @error('judul') has-error @enderror">
        <label for="judul">Judul layanan</label>
        <input id="judul" name="judul" type="text" value="{{ old('judul', $service->judul ?? '') }}" required>
        @error('judul') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field @error('sub_judul') has-error @enderror">
        <label for="sub_judul">Sub judul singkat</label>
        <input id="sub_judul" name="sub_judul" type="text" value="{{ old('sub_judul', $service->sub_judul ?? '') }}" required>
        @error('sub_judul') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field admin-editor-field-wide @error('judul_deskripsi') has-error @enderror">
        <label for="judul_deskripsi">Judul deskripsi</label>
        <input id="judul_deskripsi" name="judul_deskripsi" type="text" value="{{ old('judul_deskripsi', $service->judul_deskripsi ?? '') }}" required>
        @error('judul_deskripsi') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field admin-editor-field-wide @error('deskripsi') has-error @enderror">
        <label for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="6" required>{{ old('deskripsi', $service->deskripsi ?? '') }}</textarea>
        @error('deskripsi') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field @error('judul_point') has-error @enderror">
        <label for="judul_point">Judul poin</label>
        <input id="judul_point" name="judul_point" type="text" value="{{ old('judul_point', $service->judul_point ?? 'Potential deliverables') }}" required>
        @error('judul_point') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field @error('point') has-error @enderror">
        <label for="point">Poin singkat</label>
        <input id="point" name="point" type="text" value="{{ old('point', $service->point ?? '') }}" required>
        @error('point') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field admin-editor-field-wide @error('content') has-error @enderror">
        <label for="content">Daftar keunggulan <span>(satu poin per baris)</span></label>
        <textarea id="content" name="content" rows="5" required>{{ old('content', isset($service) ? implode("\n", $service->content ?? []) : '') }}</textarea>
        @error('content') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field admin-editor-field-wide @error('image') has-error @enderror">
        <label for="image">Gambar layanan <span>(opsional, maksimal 8 MB)</span></label>
        <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp">
        @if (isset($service) && $service->image)
            <img class="admin-image-preview is-visible" src="{{ str_starts_with($service->image, 'services/') ? asset('storage/' . $service->image) : asset($service->image) }}" alt="Gambar {{ $service->judul }}">
        @endif
        @error('image') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="admin-editor-actions">
    <a class="admin-back-link" href="{{ route('admin.services.index') }}">Batal</a>
    <button class="admin-button" type="submit">Simpan layanan</button>
</div>
