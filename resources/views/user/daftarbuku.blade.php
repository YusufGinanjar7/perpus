<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Daftar Buku</title>
    @laravelPWA
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/daftarbuku.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body>

    <!-- Navbar -->
    <header>
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <!-- Logo dan Teks -->
                <div class="logo d-flex align-items-center ms-3">
                    <a href="{{ route('index') }}" class="d-flex align-items-center text-decoration-none">
                        <img alt="Library Logo" height="50" src="/images/emojione_books.png" width="50" class="me-3" />
                        <span class="fw-bold" style="color: #3b82f6;">Perpustakaan Online</span>
                    </a>
                </div>

                <!-- Tombol Hamburger untuk Menu Mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu Offcanvas -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="fw-bold" style="color: #3b82f6;" id="offcanvasNavbarLabel">Perpustakaan Online</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile') }}">Profil</a>
                            </li>
                            <!-- Katalog Buku -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('daftarbuku') }}">Katalog Buku</a>
                            </li>
                            <!-- Pinjam Buku -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pinjam.buku') }}">Pinjam Buku</a>
                            </li>
                            <!-- Wishlist Buku -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('wishlist.show') }}">Wishlist Buku</a>
                            </li>
                            <!-- Berita -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('news.show') }}">berita</a>
                            </li>
                            <!-- Contact Us -->
                            <li class="nav-item">
                                <a class="nav-link" href="#contact-us">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="book-section">
        <div class="search-bar">
            <form action="{{ route('daftarbuku') }}" method="GET">
                <input name="search" placeholder="Cari berdasarkan judul atau genre" type="text" value="{{ request('search') }}" />
                <button type="submit">Cari</button>
            </form>
        </div>
        <div class="filter">
            <form action="{{ route('daftarbuku') }}" method="GET" id="genreFilterForm">
                <select name="genre" onchange="this.form.submit()">
                    <option value="genre">Genre Buku</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->name_genre }}"
                            {{ request('genre') == $genre->name_genre ? 'selected' : '' }}>
                            {{ $genre->name_genre }}
                        </option>
                    @endforeach
                </select>
            </form>
            <h2>Buku</h2>
        </div>

        <div class="buku" id="katalog">
            <div class="books">
                @foreach($books as $book)
                    <div class="book">
                        <img alt="{{ $book->title }}" src="{{ asset($book->book_image) }}" />
                        <p>{{ $book->title }}</p>
                        <p class="author">{{ $book->author }}</p>
                        <div class="hover-content">
                            <button class="wishlist" data-book-id="{{ $book->id }}">Add to wishlist</button>
                            <a href="{{ route('pinjam.buku') }}">
                                <button class="borrow">Add to pinjam buku</button>
                            </a>
                            <a href="{{ route('book.show', $book->id) }}">
                                <button class="borrow">Lihat Detail</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="footer" id="contact-us" data-aos="fade-up" data-aos-duration="3000ms">
        <div class="contact-info">
            <div class="gbrinfo">
                <img src="/images/fluent-color_library-20.png" alt="Library Icon" />
            </div>
            <div class="phone-info">
                <img src="/images/phone.png" alt="Phone Icon" class="phone-icon" />
                <p>+62 888 999 777</p>
            </div>
            <div class="email-info">
                <img src="/images/email.png" alt="email icon" class="email-icon" />
                <p>example@email.com</p>
            </div>
            <div class="lokasi-info">
                <img src="/images/location.png" alt="lokasi icon" class="lokasi-icon" />
                <p>Jl. Jalan, Kota Bandung, Jawa Barat, Indonesia</p>
            </div>
        </div>

        <div class="contact-form">
            <h2>Perpustakaan Online</h2>
            <p>Any question or remarks? Let us know!</p>
            <input type="text" placeholder="Enter your name" />
            <input type="email" placeholder="Enter your email" />
            <textarea placeholder="Type your message here"></textarea>
            <button>Submit</button>
        </div>
    </footer>

    <div class="copyright-info">
        <p>&copy; 2024 Perpustakaan Online. All rights reserved.</p>
    </div>

    <script>
        const wishlistAddUrl = "{{ route('wishlist.add', '') }}";  // ini benar
        const csrfToken = "{{ csrf_token() }}";
    </script>
    <script src="/js/daftarbuku.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>
