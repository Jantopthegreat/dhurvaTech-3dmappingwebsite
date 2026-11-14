@if ($errors->any())
    <div class="admin-alert" role="alert">
        <strong>Produk belum bisa disimpan</strong>
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="admin-editor-grid">
    <div class="admin-editor-field @error('name') has-error @enderror">
        <label for="name">Nama produk</label>
        <input id="name" name="name" type="text" value="{{ old('name', $product->name ?? '') }}" required>
        @error('name') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field @error('category') has-error @enderror">
        <label for="category">Kategori</label>
        @php
            $selectedCategory = old('category', $product->category ?? '');
            $isNewCategory = $selectedCategory !== '' && !in_array($selectedCategory, $categories ?? [], true);
        @endphp
        <select id="category" name="category" required>
            <option value="" disabled @selected($selectedCategory === '')>Pilih kategori</option>
            @foreach ($categories ?? [] as $category)
                <option value="{{ $category }}" @selected($selectedCategory === $category)>{{ $category }}</option>
            @endforeach
            <option value="__new__" @selected($isNewCategory)>+ Tambah kategori baru</option>
        </select>
        <input
            id="category-new"
            name="category_new"
            type="text"
            value="{{ $isNewCategory ? $selectedCategory : old('category_new') }}"
            placeholder="Masukkan kategori baru"
            @disabled(!$isNewCategory)
            @required($isNewCategory)
        >
        <small>Pilih kategori yang tersedia atau tambah kategori baru.</small>
        @error('category') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field @error('type') has-error @enderror">
        <label for="type">Jenis transaksi</label>
        <select id="type" name="type" required>
            <option value="rent" @selected(old('type', $product->type ?? '') === 'rent')>Sewa</option>
            <option value="sale" @selected(old('type', $product->type ?? '') === 'sale')>Jual</option>
        </select>
        @error('type') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field @error('availability') has-error @enderror">
        <label for="availability">Ketersediaan</label>
        <input id="availability" name="availability" type="text" value="{{ old('availability', $product->availability ?? 'Hubungi Kami') }}" required>
        @error('availability') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field @error('price_label') has-error @enderror">
        <label for="price_label">Label harga</label>
        <input id="price_label" name="price_label" type="text" value="{{ old('price_label', $product->price_label ?? 'Hubungi Kami') }}" required>
        @error('price_label') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field admin-editor-field-wide @error('description') has-error @enderror">
        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" rows="6" required>{{ old('description', $product->description ?? '') }}</textarea>
        @error('description') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field admin-editor-field-wide @error('image') has-error @enderror">
        <label for="image">Gambar produk <span>(opsional, maksimal 2 MB)</span></label>
        <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp,image/svg+xml">
        @if (isset($product) && $product->image)
            <img class="admin-image-preview is-visible" src="{{ str_starts_with($product->image, 'products/') ? asset('storage/' . $product->image) : asset($product->image) }}" alt="Gambar {{ $product->name }}">
        @endif
        @error('image') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="admin-editor-actions">
    <a class="admin-back-link" href="{{ route('admin.products.index') }}">Batal</a>
    <button class="admin-button" type="submit">Simpan produk</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const category = document.querySelector('#category');
        const newCategory = document.querySelector('#category-new');

        if (!category || !newCategory) return;

        const toggleNewCategory = () => {
            const isNew = category.value === '__new__';
            newCategory.disabled = !isNew;
            newCategory.required = isNew;
            if (isNew) newCategory.focus();
        };

        category.addEventListener('change', toggleNewCategory);
        toggleNewCategory();
    });
</script>
