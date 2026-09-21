@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
<div class="view-header">
  <h2 style="margin:0">Laporan</h2>
  <button class="btn-outline">Ekspor PDF</button>
</div>

<div class="stat-row">
  <div class="stat-card">
    <div class="k">Total tugas selesai</div>
    <div class="v">{{ $totalTugasSelesai }} tugas</div>
  </div>
  <div class="stat-card">
    <div class="k">Total upah dibayarkan</div>
    <div class="v">Rp {{ number_format($totalUpahDibayarkan, 0, ',', '.') }}</div>
  </div>
  <div class="stat-card">
    <div class="k">Tingkat kehadiran</div>
    <div class="v">{{ $tingkatKehadiran }}%</div>
  </div>
</div>

<h2 style="font-size:15px;margin:24px 0 12px">Rekap per anggota</h2>
<div class="table-scroll">
  <table>
    <thead>
      <tr><th>Nama</th><th>Tugas selesai</th><th>Total upah</th><th>Kehadiran</th></tr>
    </thead>
    <tbody>
      @foreach ($rekapAnggota as $r)
        <tr>
          <td>{{ $r['nama'] }}</td>
          <td>{{ $r['tugas_selesai'] }}</td>
          <td>Rp {{ number_format($r['total_upah'], 0, ',', '.') }}</td>
          <td>
            <span class="progress-bar"><span class="progress-bar-fill" style="width:{{ $r['kehadiran'] }}%"></span></span>{{ $r['kehadiran'] }}%
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
