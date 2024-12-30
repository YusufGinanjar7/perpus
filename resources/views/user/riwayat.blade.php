<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  @laravelPWA
  <link rel="stylesheet" href="/css/riwayat.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="icon">
        <span class="material-symbols-outlined" id="toggleIcon">keyboard_double_arrow_right</span>
        <span class="material-symbols-outlined toggle-icon" id="toggleIconExpanded">keyboard_double_arrow_left</span>
        <span class="textSidebar"></span>
    </div>
    <a href="{{ route('profile') }}" class="icon" id="person">
        <span class="material-symbols-outlined">person</span>
        <span class="textSidebar">Profil</span>
    </a>
    <a href="{{ route('index') }}" class="icon text-decoration-none" id="dashboard">
        <span class="material-symbols-outlined">dashboard</span>
        <span class="textSidebar">Halaman Utama</span>
    </a>
    <div class="icon" id="history" data-url="../riwayat/riwayat.html">
        <span class="material-symbols-outlined">History</span>
        <span class="textSidebar">History</span>
    </div>
    <div class="icon" id="logout" data-url="../landingpage/landingpage.html">
        <span class="material-symbols-outlined">logout</span>
        <span class="textSidebar">Logout</span>
    </div>
</div>
<div class="container">
    <header>
        <div class="header-left">
            <h1>Welcome, {{ $user->username }}</h1>
        </div>
        <div class="header-right">
            <p>{{ \Carbon\Carbon::now()->translatedFormat('D, d F Y') }}</p>
            <div class="profile-pic"></div>
        </div>
    </header>

    <div class="content">
        <div class="search-bar">
            <!-- Form untuk pencarian -->
            <form method="GET" action="{{ route('riwayat.show') }}" class="search-wrapper">
                <!-- Input untuk pencarian -->
                <input type="text" name="search" class="search-input" placeholder="Cari Judul Buku..." value="{{ request('search') }}">

                <!-- Tombol pencarian -->
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>

            <!-- Form untuk filter status -->
            <form method="GET" action="{{ route('riwayat.show') }}" class="filter-wrapper">
                <!-- Dropdown untuk filter status -->
                <select class="category-select" name="status">
                    <option value="">Status</option>
                    <option value="belum" {{ request('status') == 'belum' ? 'selected' : '' }}>Belum Kembali</option>
                    <option value="sudah" {{ request('status') == 'sudah' ? 'selected' : '' }}>Sudah Kembali</option>
                </select>

                <!-- Tombol untuk menerapkan filter status -->
                <button type="submit">Filter</button>
            </form>
        </div>

        <table class="transaction-table">
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>Author</th>
                    <th>Tanggal Dipinjam</th>
                    <th>Tenggat Waktu</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{ $loan->book->title }}</td>
                        <td>{{ $loan->book->author }}</td>
                        <td>{{ $loan->tanggal_peminjaman }}</td>
                        <td>{{ $loan->tanggal_pengembalian }}</td>
                        <td>
                            @if ($loan->status == 'belum')
                                <button class="action-btn gagal-btn">Belum</button>
                            @else
                                <button class="action-btn sukses-btn">Sudah</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="/js/riwayat.js"></script>
</body>

</html>
