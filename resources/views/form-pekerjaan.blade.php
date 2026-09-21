@extends('layouts.app')

@section('title', $mode === 'tambah' ? 'Tambah Jenis Pekerjaan' : 'Edit Jenis Pekerjaan')

@section('content')
<h2>{{ $mode === 'tambah' ? 'Tambah Jenis Pekerjaan' : 'Edit Jenis Pekerjaan' }}</h2>

<form method="POST" action="{{ route('kelola.pekerjaan.simpan', ['role' => $role]) }}" class="form-page">
  @csrf
  <input type="hidden" name="mode" value="{{ $mode }}">

  <div class="field">
    <label for="nama">Nama pekerjaan</label>
    <input id="nama" name="nama" type="text" value="{{ old('nama', $data['nama'] ?? '') }}" placeholder="Contoh: Pemupukan" {{ $mode === 'edit' ? 'readonly' : '' }}>
  </div>

  <div class="field">
    <label for="deskripsi">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" placeholder="Jelaskan singkat pekerjaan ini">{{ old('deskripsi', $data['deskripsi'] ?? '') }}</textarea>
  </div>

  <div class="field">
    <label for="jumlah_dibutuhkan">Jumlah orang dibutuhkan / sesi</label>
    <input id="jumlah_dibutuhkan" name="jumlah_dibutuhkan" type="number" min="1" value="{{ old('jumlah_dibutuhkan', $data['jumlah_dibutuhkan'] ?? '') }}" placeholder="Contoh: 4">
  </div>

  <div class="form-actions">
    <button type="submit" class="btn-primary" style="width:auto;padding:10px 20px">Simpan</button>
    <a href="{{ route('kelola.pekerjaan', ['role' => $role]) }}" class="btn-outline" style="display:inline-flex;align-items:center;text-decoration:none">Batal</a>
  </div>
</form>
@endsection
