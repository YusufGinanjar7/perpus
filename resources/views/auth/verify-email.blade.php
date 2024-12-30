<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 90%;
        }
        .icon {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
        }
        h1 {
            color: #333;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }
        p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        .verify-button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }
        .verify-button:hover {
            background-color: #45a049;
        }
        .email-note {
            font-size: 0.9rem;
            color: #888;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="/api/placeholder/80/80" alt="Email Icon" class="icon">
        <h1>Verifikasi Email Anda</h1>
        <p>Terima kasih telah mendaftar! Untuk melanjutkan, silakan cek email Anda dengan mengklik tombol di bawah ini.</p>
        <a href="https://mail.google.com" class="verify-button" target="_blank">Verifikasi Email</a>
        <p class="email-note">Jika tombol tidak berfungsi, silakan cek folder spam di email Anda.</p>
    </div>
</body>
</html>
