@extends('layouts.app')

@section('title', 'Penugasan')

@section('content')
<div class="view-header">
  <h2 style="margin:0">Penugasan</h2>
  <button class="btn-outline">Generate jadwal otomatis</button>
</div>
<div class="table-scroll">
  <table>
    <thead>
      <tr><th>Tanggal</th><th>Pekerjaan</th><th>Petugas</th><th>Status</th></tr>
    </thead>
    <tbody>
      @foreach ($daftarTugas as $tugas)
        <tr class="@if($tugas['hari_ini']) today @endif">
          <td>{{ $tugas['tanggal'] }}</td>
          <td>{{ $tugas['pekerjaan'] }}</td>
          <td>{{ $tugas['petugas'] }}</td>
          <td>{{ $tugas['status'] }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
