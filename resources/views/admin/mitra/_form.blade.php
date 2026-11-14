@if ($errors->any())
    <div class="admin-alert" role="alert">
        <strong>Data mitra belum bisa disimpan</strong>
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="admin-editor-grid">
    <div class="admin-editor-field @error('nama') has-error @enderror">
        <label for="nama">Nama mitra</label>
        <input id="nama" name="nama" type="text" value="{{ old('nama', $mitra->nama ?? '') }}" required>
        @error('nama') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field @error('image') has-error @enderror">
        <label for="image">Logo mitra <span>(opsional, maksimal 8 MB)</span></label>
        <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp,image/svg+xml">
        @if (isset($mitra) && $mitra->image)
            <img class="admin-image-preview is-visible" src="{{ str_starts_with($mitra->image, 'mitra/') ? asset('storage/' . $mitra->image) : asset($mitra->image) }}" alt="Logo {{ $mitra->nama }}">
        @endif
        @error('image') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="admin-editor-actions">
    <a class="admin-back-link" href="{{ route('admin.mitra.index') }}">Batal</a>
    <button class="admin-button" type="submit">Simpan mitra</button>
</div>
