@if ($errors->any())
    <div class="admin-alert" role="alert">
        <strong>Data kontak belum bisa disimpan</strong>
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="admin-editor-grid">
    <div class="admin-editor-field @error('name') has-error @enderror">
        <label for="name">Nama</label>
        <input id="name" name="name" type="text" value="{{ old('name', $contact->name ?? '') }}" required>
        @error('name') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field @error('email') has-error @enderror">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email', $contact->email ?? '') }}" required>
        @error('email') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field @error('no_hp') has-error @enderror">
        <label for="no_hp">Nomor WhatsApp</label>
        <input id="no_hp" name="no_hp" type="text" value="{{ old('no_hp', $contact->no_hp ?? '') }}" placeholder="+62 812 3456 7890" pattern="\+62\s\d{3,4}\s\d{3,4}\s\d{3,4}" required>
        <small>Format: +62 xxx xxxx xxxx</small>
        @error('no_hp') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
    <div class="admin-editor-field @error('alamat') has-error @enderror">
        <label for="alamat">Alamat</label>
        <input id="alamat" name="alamat" type="text" value="{{ old('alamat', $contact->alamat ?? '') }}" required>
        @error('alamat') <p class="admin-field-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="admin-editor-actions">
    <a class="admin-back-link" href="{{ route('admin.contact.index') }}">Batal</a>
    <button class="admin-button" type="submit">Simpan</button>
</div>
