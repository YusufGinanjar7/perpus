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
    <link rel="stylesheet" href="landingpage/landingpage.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>

    <!-- Navbar -->
    <header>
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <!-- Logo dan Teks -->
                <div class="logo d-flex align-items-center ms-3">
                    <img alt="Library Logo" height="50" src="images/emojione_books.png" width="50" class="me-3" />
                    <span class="fw-bold" style="color: #3b82f6;">Perpustakaan Online</span>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section" data-aos="fade-in">
        <div class="bgblue">
            <img src="images/Group 239182.png" alt="bgblue">
        </div>
        <div class="hero">
            <div class="text">
                <h1>Search & review <br>your <span>fav book</span> <br> effortlessly</h1>
                <p>Embark on a literary journey like never before with our revolutionary library application!
                    Introducing a seamless experience that transcends traditional boundaries, where you can effortlessly
                    search your favorite books.</p>
                <div class="start-now">
                    <a href="{{ route('login') }}">
                        <button>Start Now →</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="about-us" id="about-us" data-aos="fade-up">
        <div class="about-us-content">
            <h2>About Us</h2>
            <p>Who We Are <br> "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Nullam vehicula, orci sit amet pellentesque fermentum, quam augue tristique
                risus, a tincidunt risus mi eget urna. Phasellus id eros ac lorem convallis
                feugiat. Donec aliquet sapien sit amet facilisis efficitur." <br>
                Mission Statement <br>
                "To cultivate a love for reading, provide access to knowledge, and support lifelong
                learning within our community." <br>
                Core Values <br>
                1. Knowledge Sharing <br>
                "Promoting open access to information for everyone." <br>
                2. Community Support <br>
                "Fostering a welcoming space for collaboration and growth." <br>
                3. Accessibility <br>
                "Ensuring resources are available to all members of our diverse community." <br>
                Meet Our Team <br>
                ~ John Doe - Head Librarian <br>
                "Dedicated to making knowledge accessible and fostering a learning community." <br>
                ~ Jane Smith - Archivist <br>
                "Passionate about preserving history for future generations."<br>
                ~ Mark Johnson - Digital Resources Manager <br>
                "Focused on leveraging technology to enhance library services."
            </p>
        </div>
    </section>

    <section class="features" id="features" data-aos="fade-up">
        <h2 class="features-title">Features</h2>
        <li><b>Apa yang bisa kamu lakukan?</b></li>
        <div class="features-container">
            <div class="feature-item" data-aos="fade-right">
                <img src="images/search.png" alt="Cari buku" class="feature-icon">
                <h3>Cari buku dan katalog buku</h3>
                <p>Effortlessly find your next read with our powerful and intuitive book search.</p>
            </div>
            <div class="feature-item" data-aos="fade-up">
                <img src="images/pinjam-buku.png" alt="Pinjam buku" class="feature-icon">
                <h3>Pinjam buku</h3>
                <p>Discover insightful critiques and share your thoughts on diverse literary masterpieces effortlessly.
                </p>
            </div>
            <div class="feature-item" data-aos="fade-left">
                <img src="images/wishlist.png" alt="Wishlist buku" class="feature-icon">
                <h3>Buku wishlist</h3>
                <p>Curate your literary dreams—wishlist books for future adventures and discoveries.</p>
            </div>
        </div>
    </section>


    <section class="features" id="features">

    </section>

    <footer class="footer" id="contact-us" data-aos="fade-up">
        <div class="contact-info">
            <div class="gbrinfo">
                <img src="images/fluent-color_library-20.png" alt="Library Icon" />
            </div>
            <div class="phone-info">
                <img src="images/phone.png" alt="Phone Icon" class="phone-icon" />
                <p>+62 888 999 777</p>
            </div>
            <div class="email-info">
                <img src="images/email.png" alt="email icon" class="email-icon" />
                <p>example@email.com</p>
            </div>
            <div class="lokasi-info">
                <img src="images/location.png" alt="lokasi icon" class="lokasi-icon" />
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

    <script src="landingpage/landingpage.js"></script>
</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>
