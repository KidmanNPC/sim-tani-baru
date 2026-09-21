@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<h2>Beranda</h2>
<div class="stat-row">
  <div class="stat-card">
    <div class="k">Tugas hari ini</div>
    <div class="v">{{ $tugasHariIni }}</div>
  </div>
  <div class="stat-card">
    <div class="k">Upah harian</div>
    <div class="v">Rp {{ number_format($upahHarian, 0, ',', '.') }}</div>
  </div>
</div>
<div class="banner">Pengumuman: {{ $pengumuman }}</div>
@endsection
