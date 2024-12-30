<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku</title>
    @laravelPWA
    <link rel="stylesheet" href="/css/pinjambuku.css">
    <link rel="stylesheet" href="/js/pinjambuku.js">
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <section class="pinjambuku" data-aos="fade-in">
        <h2>Pinjam Buku Hallo</h2>
    </section>
    <section class="pinjam-container" data-aos="fade-up" data-aos-duration="3000ms">
        <div class="pinjam">
            <p class="text"><span>Home </span> / Pinjam Buku</p>
            <h3>Pinjam Buku</h3>
            <p>Input your full name, username, phone number and password.</p>

            <!-- Menampilkan pesan sukses -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Menampilkan pesan kesalahan -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="pinjamBuku" method="POST" action="{{ route('pinjam.buku.store') }}">
                @csrf
                <div class="form-container">
                    <div class="left">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Masukkan Nama" value="{{ $user->fullname }}" required>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan Email" value="{{ $user->email }}" required>

                        <label for="phonenumber">Phone Number</label>
                        <input type="tel" id="phonenumber" name="phone_number" placeholder="Masukkan Nomor Telpon" value="{{ $user->phone_number }}" required>

                        <label for="judul">Judul Buku </label>
                        <input type="text" id="judul" name="judul" placeholder="Masukkan Judul Buku" required>

                        <label for="tanggalpinjam">Tanggal Peminjaman</label>
                        <input type="date" id="tanggalpinjam" name="tanggal_peminjaman" required>
                    </div>
                </div>
                <div class="checkbox-container">
                    <input type="checkbox" id="terms" name="terms" required />
                    <label for="terms">I agree to the <a href="{{ route('terms.show') }}">terms and conditions</a></label>
                </div>
                <button id="submitBtn" type="submit">Submit</button>
            </form>
            <button onclick="location.href='{{ route('index') }}'" class="btn-back">Home</button>
        </div>
    </section>
    <footer>
        &copy; 2024 Perpustakaan Online. All rights reserved.
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#searchButton').click(function () {
            var judul = $('#judul').val();
            $.ajax({
                url: '{{ route('search.book') }}',
                method: 'GET',
                data: { judul: judul },
                success: function (data) {
                    var results = '<ul>';
                    data.forEach(function (book) {
                        results +=
                            '<li>' +
                            book.title +
                            ' <button type="button" class="select-book" data-id="' +
                            book.id +
                            '">Pilih</button></li>';
                    });
                    results += '</ul>';
                    $('#searchResults').html(results);
                },
            });
        });

        $(document).on('click', '.select-book', function () {
            var bookId = $(this).data('id');
            $('#book_id').val(bookId);
            $('#judul').val(''); // Kosongkan input judul
        });
    </script>
    <script src="/js/pinjambuku.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
