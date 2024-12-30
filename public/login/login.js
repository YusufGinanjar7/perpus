document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah pengiriman form ke server
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
});
