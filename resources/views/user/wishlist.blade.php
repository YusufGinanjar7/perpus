<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Perpustakaan Online</title>
    @laravelPWA
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/wishlistbuku.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body>

    <!-- Navbar -->
    <header>
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <!-- Logo dan Teks -->
                <div class="logo d-flex align-items-center ms-3">
                    <img alt="Library Logo" height="50" src="/images/emojione_books.png" width="50" class="me-3" />
                    <span class="fw-bold" style="color: #3b82f6;">Perpustakaan Online</span>
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

    <section class="book-section">
        <div class="filter">
            <form action="{{ route('wishlist.show') }}" method="GET" id="genreFilterForm">
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
        <!-- <h2>Buku</h2> -->
        <div class="buku" id="katalog" data-aos="fade-up" data-aos-duration="30000ms">
            <div class="books">
                <!-- Loop through the filtered wishlist books -->
                @forelse($wishlist as $item)
                    <div class="book" data-url="/detailbuku/detailbuku.html">
                        <img alt="{{ $item->book->title }}" src="{{ asset($item->book->book_image) }}" /> <!-- Assuming 'image' field in books table -->
                        <p>{{ $item->book->title }}</p>
                        <p class="author">{{ $item->book->author }}</p>
                        <p class="genre">
                            @if ($item->book->genres->isNotEmpty())
                                {{ $item->book->genres->first()->name_genre }} <!-- Ambil genre pertama jika ada -->
                            @else
                                No Genre Available
                            @endif
                        </p>
                        <div class="hover-content">
                            <button class="borrow">Add to pinjam buku</button>
                        </div>
                    </div>
                @empty
                    <p>Wishlist kosong atau tidak ada buku sesuai genre yang dipilih.</p>
                @endforelse
            </div>
        </div>
    </section>

    <footer class="footer" id="contact-us">
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
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="/js/wishlistbuku.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
