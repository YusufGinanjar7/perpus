<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi - Admin Panel</title>
    @laravelPWA
    <!-- Tambahkan Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/transaksi.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Hallo Admin</h2>
        <ul>
            <li><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('dashboard.users') }}"><i class="fas fa-user"></i> Data User</a></li>
            <li><a href="{{ route('dashboard.books') }}"><i class="fas fa-book"></i> Data Buku</a></li>
            <li class="active"><a href="{{ route('dashboard.loans') }}"><i class="fas fa-exchange-alt"></i> Transaksi</a></li>
            <li>
                <form method="GET" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="search-bar">
            <div class="search-wrapper">
                <input type="text" class="search-input" placeholder="Cari transaksi...">
                <button class="search-btn">Cari</button>
            </div>
            <select class="category-select">
                <option value="all">Semua Kategori</option>
                <option value="overdue">Terlambat</option>
                <option value="returned">Dikembalikan</option>
            </select>
        </div>

        <table class="transaction-table">
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>User</th>
                    <th>Tanggal Dipinjam</th>
                    <th>Tenggat Waktu</th>
                    <th>Status</th>
                    <th>Denda</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->booking->book->title }}</td>
                    <td>{{ $loan->booking->user->fullname }}</td>
                    <td>{{ $loan->tanggal_peminjaman }}</td>
                    <td>{{ $loan->tanggal_pengembalian }}</td>
                    <td>{{ ucfirst($loan->status) }}</td>
                    <td>Rp {{ number_format($loan->denda, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('dashboard.loans.update', $loan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" class="status-select">
                                <option value="belum" {{ $loan->status === 'belum' ? 'selected' : '' }}>Belum</option>
                                <option value="dikembalikan" {{ $loan->status === 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                            </select>
                            <button type="submit" class="action-btn edit-btn">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
