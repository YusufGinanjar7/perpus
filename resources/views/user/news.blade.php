<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
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

    <div class="jumbotron text-center bg-primary text-white py-4">
        <h1>Science News</h1>
    </div>

    <div class="container-fluid">
        @if(isset($newsData['articles']) && is_array($newsData['articles']))
            @foreach ($newsData['articles'] as $news)
                <div class="row NewsGrid my-4">
                    <div class="col-md-3">
                        <img src="{{ $news['urlToImage'] ?? 'placeholder.jpg' }}" alt="News thumbnail" class="rounded img-fluid">
                    </div>
                    <div class="col-md-9">
                        <h2>Title: {{ $news['title'] ?? 'No Title' }}</h2>
                        <h5>Description: {{ $news['description'] ?? 'No Description' }}</h5>
                        <p>Content: {{ $news['content'] ?? 'No Content' }}</p>
                        <h6>Author: {{ $news['author'] ?? 'Unknown' }}</h6>
                        <h6>Published: {{ $news['publishedAt'] ?? 'No Date' }}</h6>
                        <a href="{{ $news['url'] ?? '#' }}" class="btn btn-primary" target="_blank">Read More</a>
                    </div>
                </div>
                <hr>
            @endforeach
        @else
            <p>No news data available.</p>
        @endif
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
