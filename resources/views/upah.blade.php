@extends('layouts.app')

@section('title', 'Upah')

@section('content')
<h2>Upah</h2>
<div class="stat-row">
  <div class="stat-card">
    <div class="k">Total bulan ini</div>
    <div class="v">Rp {{ number_format($totalBulanIni, 0, ',', '.') }}</div>
  </div>
  <div class="stat-card">
    <div class="k">Belum dibayar</div>
    <div class="v">Rp {{ number_format($belumDibayar, 0, ',', '.') }}</div>
  </div>
</div>
<div class="table-scroll">
  <table>
    <thead>
      <tr><th>Tanggal</th><th>Pekerjaan</th><th>Jumlah</th><th>Status pembayaran</th></tr>
    </thead>
    <tbody>
      @foreach ($riwayatUpah as $u)
        <tr>
          <td>{{ $u['tanggal'] }}</td>
          <td>{{ $u['pekerjaan'] }}</td>
          <td>Rp {{ number_format($u['jumlah'], 0, ',', '.') }}</td>
          <td>
            @if ($u['dibayar'])
              <span class="badge">Sudah dibayar</span>
            @else
              <span class="badge-warn">Belum dibayar</span>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
