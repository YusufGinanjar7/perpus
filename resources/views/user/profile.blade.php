<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    @laravelPWA
    <link rel="stylesheet" href="/css/profil.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <a href="{{ route('riwayat.show') }}" class="icon text-decoration-none" id="dashboard">
            <span class="material-symbols-outlined">History</span>
            <span class="textSidebar">History</span>
        </a>
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

        <main>
            <div class="profile">
                <div class="profile-header">
                    <div class="profile-info">
                        <h2>{{ $user->fullname }}</h2>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="button-group">
                        <button type="button" class="btn-edit" id="editButton">Edit</button>
                        <button type="submit" form="profileForm" class="btn-save" id="saveButton" style="display: none;">Save</button>
                    </div>
                </div>
                <form id="profileForm" method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    <div class="form-container">
                        <div class="left">
                            <label for="fullname">Full Name</label>
                            <input type="text" id="fullname" name="fullname" value="{{ $user->fullname }}" placeholder="Enter your Full Name" required disabled>

                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="{{ $user->username }}" placeholder="Enter your Username" required disabled>
                        </div>
                        <div class="right">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" id="phonenumber" name="phone_number" value="{{ $user->phone_number }}" placeholder="Enter your Phone Number" required disabled>

                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" value="{{ $user->address }}" placeholder="Enter your Address" required disabled>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script src="/js/profil.js">
    </script>
</body>

</html>
