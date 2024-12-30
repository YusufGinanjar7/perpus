<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku - Admin Panel</title>
    @laravelPWA
    <link rel="stylesheet" href="/css/buku.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Hallo Admin</h2>
        <ul>
            <li><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('dashboard.users') }}"><i class="fas fa-user"></i> Data User</a></li>
            <li class="active"><a href="{{ route('dashboard.books') }}"><i class="fas fa-book"></i> Data Buku</a></li>
            <li><a href="{{ route('dashboard.loans') }}"><i class="fas fa-exchange-alt"></i> Transaksi</a></li>
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

    <!-- Content -->
    <div class="content">
        <div class="search-bar">
            <div class="search-wrapper">
                <input type="text" placeholder="Cari..." class="search-input">
                <button class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
                <button id="showFormButton" onclick="openForm()">Tambah Buku</button>
            </div>
        </div>

        <table class="book-table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Genre</th>
                    <th>Tahun Terbit</th>
                    <th>Penerbit</th>
                    <th>Ketersediaan</th>
                    <th>Total</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ implode(', ', $book->genres->pluck('name_genre')->toArray()) }}</td>
                    <td>{{ $book->published_year }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>{{ $book->available_copies }}</td>
                    <td>{{ $book->total_copies }}</td>
                    <td>{{ $book->price }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $book->book_image) }}" target="_blank">
                            <img src="{{ asset('storage/' . $book->book_image) }}" alt="{{ $book->title }}" width="50">
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm"
                            onclick="openEditModal('{{ $book->id }}', '{{ $book->title }}', '{{ $book->author }}', '{{ $book->published_year }}', '{{ $book->publisher }}', '{{ $book->available_copies }}', '{{ $book->total_copies }}', '{{ $book->price }}', '{{ $book->synopsis }}')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <form method="POST" action="{{ route('books.destroy', $book->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete-btn" onclick="return confirm('Hapus buku ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah/Edit Buku -->
    <div id="overlay" class="overlay" onclick="closeForm()"></div>
    <div id="formContainer" class="form-overlay">
        <div class="form-content">
            <h2 id="bookModalLabel">Tambah Buku</h2>
            <form action="{{ route('books.store') }}" id="bookForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="bookId" name="bookId">
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <div id="genre" style="border: 1px solid #ced4da; border-radius: 5px; max-height: 200px; overflow-y: auto; padding: 10px;">
                                @foreach ($genres as $genre)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="genre[]" id="genre-{{ $genre->id }}" value="{{ $genre->id }}"
                                        {{ isset($book) && $book->genres->pluck('id')->contains($genre->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="genre-{{ $genre->id }}">
                                        {{ $genre->name_genre }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="published_year" class="form-label">Tahun Terbit</label>
                            <input type="text" class="form-control" id="published_year" name="published_year" required>
                        </div>
                    </div>
                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="publisher" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" id="publisher" name="publisher" required>
                        </div>
                        <div class="mb-3">
                            <label for="available_copies" class="form-label">Ketersediaan</label>
                            <input type="number" class="form-control" id="available_copies" name="available_copies" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_copies" class="form-label">Total Copy</label>
                            <input type="number" class="form-control" id="total_copies" name="total_copies" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="book_image" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="book_image" name="book_image">
                </div>
                <div class="mb-3">
                    <label for="synopsis" class="form-label">Sinopsis</label>
                    <textarea class="form-control" id="synopsis" name="synopsis" rows="3" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="closeForm()" class="btn btn-secondary">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="/js/buku.js"></script>
</body>

</html>
