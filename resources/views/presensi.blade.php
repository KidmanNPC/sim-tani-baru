@extends('layouts.app')

@section('title', 'Presensi')

@section('content')
<div class="view-header">
  <h2 style="margin:0">Presensi</h2>
  @if ($sudahCheckinHariIni)
    <button class="btn-outline" disabled>Sudah check-in hari ini</button>
  @else
    <button class="btn-primary" style="width:auto;padding:8px 16px">Check-in sekarang</button>
  @endif
</div>
<div class="table-scroll">
  <table>
    <thead>
      <tr><th>Tanggal</th><th>Waktu masuk</th><th>Waktu keluar</th><th>Status</th></tr>
    </thead>
    <tbody>
      @foreach ($riwayatPresensi as $p)
        <tr class="@if($p['hari_ini']) today @endif">
          <td>{{ $p['tanggal'] }}</td>
          <td>{{ $p['masuk'] }}</td>
          <td>{{ $p['keluar'] ?? '—' }}</td>
          <td>{{ $p['status'] }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
