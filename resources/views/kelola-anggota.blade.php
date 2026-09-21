@extends('layouts.app')

@section('title', 'Kelola Anggota')

@section('content')
@if (session('sukses'))
  <div class="banner-success">{{ session('sukses') }}</div>
@endif
<div class="view-header">
  <h2 style="margin:0">Kelola Anggota</h2>
  <a href="{{ route('kelola.anggota.tambah', ['role' => $role]) }}" class="btn-outline" style="text-decoration:none">+ Tambah Anggota</a>
</div>
<div class="table-scroll">
  <table>
    <thead>
      <tr><th>No. anggota</th><th>Nama</th><th>WhatsApp</th><th>Role</th><th>Status</th><th>Aksi</th></tr>
    </thead>
    <tbody>
      @foreach ($daftarAnggota as $a)
        <tr>
          <td>{{ $a['no_anggota'] }}</td>
          <td>{{ $a['nama'] }}</td>
          <td>{{ $a['wa'] }}</td>
          <td>{{ $a['role'] }}</td>
          <td>
            @if ($a['aktif'])
              <span class="badge">Aktif</span>
            @else
              <span class="badge-warn">Nonaktif</span>
            @endif
          </td>
          <td>
            <a href="{{ route('kelola.anggota.edit', ['no_anggota' => $a['no_anggota'], 'role' => $role]) }}" class="table-action">Edit</a>
            <a href="#" class="table-action danger">Hapus</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
