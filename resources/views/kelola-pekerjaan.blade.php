@extends('layouts.app')

@section('title', 'Kelola Jenis Pekerjaan')

@section('content')
@if (session('sukses'))
  <div class="banner-success">{{ session('sukses') }}</div>
@endif
<div class="view-header">
  <h2 style="margin:0">Kelola Jenis Pekerjaan</h2>
  <a href="{{ route('kelola.pekerjaan.tambah', ['role' => $role]) }}" class="btn-outline" style="text-decoration:none">+ Tambah Jenis Pekerjaan</a>
</div>
<div class="table-scroll">
  <table>
    <thead>
      <tr><th>Nama pekerjaan</th><th>Deskripsi</th><th>Orang dibutuhkan/sesi</th><th>Aksi</th></tr>
    </thead>
    <tbody>
      @foreach ($daftarPekerjaan as $p)
        <tr>
          <td>{{ $p['nama'] }}</td>
          <td>{{ $p['deskripsi'] }}</td>
          <td>{{ $p['jumlah_dibutuhkan'] }} orang</td>
          <td>
            <a href="{{ route('kelola.pekerjaan.edit', ['nama' => $p['nama'], 'role' => $role]) }}" class="table-action">Edit</a>
            <a href="#" class="table-action danger">Hapus</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
