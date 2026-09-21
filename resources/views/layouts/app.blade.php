<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SIM-Tani — @yield('title')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div id="app-shell">
  <div class="mobile-topbar">
    <button class="icon-btn" id="btn-menu" aria-label="Buka menu">
      <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
    </button>
    <div class="mobile-topbar-brand"><img src="{{ asset('images/Logo.jpg') }}" alt="" class="brand-logo">SIM-Tani</div>
  </div>

  <div id="sidebar-backdrop"></div>

  <aside class="sidebar" id="sidebar">
    <div class="brand"><img src="{{ asset('images/Logo.jpg') }}" alt="Logo SIM-Tani" class="brand-logo">SIM-Tani</div>
    <nav>
      <a href="{{ route('beranda', ['role' => $role]) }}" class="nav-item @if(request()->routeIs('beranda')) active @endif">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l9-8 9 8"/><path d="M5 10v10a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1V10"/></svg>
        <span>Beranda</span>
      </a>
      <a href="{{ route('penugasan', ['role' => $role]) }}" class="nav-item @if(request()->routeIs('penugasan')) active @endif">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/></svg>
        <span>Penugasan</span>
      </a>
      <a href="{{ route('presensi', ['role' => $role]) }}" class="nav-item @if(request()->routeIs('presensi')) active @endif">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 12l3 3 6-6"/></svg>
        <span>Presensi</span>
      </a>
      <a href="{{ route('upah', ['role' => $role]) }}" class="nav-item @if(request()->routeIs('upah')) active @endif">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7a2 2 0 0 1 2-2h13a1 1 0 0 1 1 1v3"/><path d="M3 7v10a2 2 0 0 0 2 2h14a1 1 0 0 0 1-1V10a1 1 0 0 0-1-1h-5a2 2 0 1 0 0 4h5"/></svg>
        <span>Upah</span>
      </a>
      <a href="{{ route('profil', ['role' => $role]) }}" class="nav-item @if(request()->routeIs('profil')) active @endif">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/></svg>
        <span>Profil</span>
      </a>

      @if ($role === 'admin')
        <div class="nav-label">Kelola</div>
        <a href="{{ route('kelola.anggota', ['role' => $role]) }}" class="nav-item @if(request()->routeIs('kelola.anggota')) active @endif">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="7" r="3"/><path d="M2 20c0-3.5 3-5.5 7-5.5s7 2 7 5.5"/><circle cx="17" cy="8" r="2.5"/><path d="M22 20c0-2.8-2-4.5-4.5-4.8"/></svg>
          <span>Anggota</span>
        </a>
        <a href="{{ route('kelola.pekerjaan', ['role' => $role]) }}" class="nav-item @if(request()->routeIs('kelola.pekerjaan')) active @endif">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a3 3 0 1 1-4.4 4.1L4 17v3h3l6.6-6.6a3 3 0 1 1 4.1-4.4l3-2.7-2.3-2.3-2.7 3Z"/></svg>
          <span>Pekerjaan</span>
        </a>
        <a href="{{ route('laporan', ['role' => $role]) }}" class="nav-item @if(request()->routeIs('laporan')) active @endif">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h9l5 5v13a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z"/><path d="M9 12h6M9 16h6M9 8h3"/></svg>
          <span>Laporan</span>
        </a>
      @endif
    </nav>
    {{-- TODO: ganti jadi form POST ke route logout beneran setelah auth diimplementasikan --}}
    <a href="{{ route('login') }}" class="logout">Keluar</a>
  </aside>

  <main id="main-content">
    <section class="view active">
      @yield('content')
    </section>
  </main>
</div>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
