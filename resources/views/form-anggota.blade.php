@extends('layouts.app')

@section('title', $mode === 'tambah' ? 'Tambah Anggota' : 'Edit Anggota')

@section('content')
<h2>{{ $mode === 'tambah' ? 'Tambah Anggota' : 'Edit Anggota' }}</h2>

<form method="POST" action="{{ route('kelola.anggota.simpan', ['role' => $role]) }}" class="form-page">
  @csrf
  <input type="hidden" name="mode" value="{{ $mode }}">

  <div class="field">
    <label for="nama">Nama lengkap</label>
    <input id="nama" name="nama" type="text" value="{{ old('nama', $data['nama'] ?? '') }}" placeholder="Contoh: Ahmad Fauzi">
  </div>

  <div class="field">
    <label for="no_anggota">No. anggota</label>
    <input id="no_anggota" name="no_anggota" type="text" value="{{ old('no_anggota', $data['no_anggota'] ?? '') }}" placeholder="Contoh: 2024005" {{ $mode === 'edit' ? 'readonly' : '' }}>
  </div>

  <div class="field">
    <label for="wa">No. WhatsApp</label>
    <input id="wa" name="wa" type="text" value="{{ old('wa', $data['wa'] ?? '') }}" placeholder="Contoh: 0812-xxxx-xxxx">
  </div>

  <div class="field">
    <label for="email">Email</label>
    <input id="email" name="email" type="email" value="{{ old('email', $data['email'] ?? '') }}" placeholder="Contoh: nama@email.com">
  </div>

  <div class="field">
    <label for="alamat">Alamat</label>
    <textarea id="alamat" name="alamat" placeholder="Alamat lengkap">{{ old('alamat', $data['alamat'] ?? '') }}</textarea>
  </div>

  <div class="field">
    <label for="role">Role</label>
    <select id="role" name="role">
      <option value="Anggota" {{ (old('role', $data['role'] ?? '')) === 'Anggota' ? 'selected' : '' }}>Anggota</option>
      <option value="Admin" {{ (old('role', $data['role'] ?? '')) === 'Admin' ? 'selected' : '' }}>Admin</option>
    </select>
  </div>

  <div class="field">
    <label for="status">Status</label>
    <select id="status" name="status">
      @php $aktif = old('status', ($data['aktif'] ?? true) ? 'aktif' : 'nonaktif'); @endphp
      <option value="aktif" {{ $aktif === 'aktif' ? 'selected' : '' }}>Aktif</option>
      <option value="nonaktif" {{ $aktif === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
    </select>
  </div>

  @if ($mode === 'tambah')
    <div class="field">
      <label for="password">Kata sandi awal</label>
      <input id="password" name="password" type="password" placeholder="Kata sandi sementara buat anggota ini">
    </div>
  @endif

  <div class="form-actions">
    <button type="submit" class="btn-primary" style="width:auto;padding:10px 20px">Simpan</button>
    <a href="{{ route('kelola.anggota', ['role' => $role]) }}" class="btn-outline" style="display:inline-flex;align-items:center;text-decoration:none">Batal</a>
  </div>
</form>
@endsection
