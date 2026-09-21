@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<h2>Profil</h2>
<div class="profile-layout">
  <div class="profile-card">
    <div class="avatar">{{ $anggota['inisial'] }}</div>
    <div>{{ $anggota['nama'] }}</div>
    <span class="badge">{{ $anggota['role'] }}</span>
  </div>
  <div class="info-rows">
    <div class="info-row"><span class="k">No. anggota</span><span>{{ $anggota['no_anggota'] }}</span></div>
    <div class="info-row"><span class="k">WhatsApp</span><span>{{ $anggota['wa'] }}</span></div>
    <div class="info-row"><span class="k">Status</span><span>{{ $anggota['status'] }}</span></div>
  </div>
</div>
@endsection
