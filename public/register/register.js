// Ambil elemen-elemen form
const fullname = document.getElementById("fullname");
const username = document.getElementById("username");
const phonenumber = document.getElementById("phonenumber");
const email = document.getElementById("email");
const address = document.getElementById("address");
const password = document.getElementById("password");
const confirmpassword = document.getElementById("confirmpassword");
const registerButton = document.querySelector("button[type='regist']");

// Fungsi untuk menampilkan pesan error
function showError(message) {
    alert(message);
}

// Fungsi validasi form
function validateForm() {
    if (!fullname.value.trim()) {
        showError("Full Name is required.");
        return false;
    }

    if (!username.value.trim()) {
        showError("Username is required.");
        return false;
    }

    if (!phonenumber.value.trim() || !/^[+]?\d+$/.test(phonenumber.value.trim())) {
        showError("Please enter a valid phone number.");
        return false;
    }

    if (!email.value.trim() || !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email.value.trim())) {
        showError("Please enter a valid email address.");
        return false;
    }

    if (!address.value.trim()) {
        showError("Address is required.");
        return false;
    }

    if (!password.value.trim()) {
        showError("Password is required.");
        return false;
    }

    if (password.value.trim() !== confirmpassword.value.trim()) {
        showError("Passwords do not match.");
        return false;
    }

    return true;
}

// Tambahkan event listener ke tombol register
registerButton.addEventListener("click", (event) => {
    event.preventDefault(); // Mencegah reload halaman

    if (validateForm()) {
        alert("Registration successful!");
        window.location.href = "../afterlogin/afterlogin.html";
        // Reset form (opsional, jika ingin menghapus semua input setelah submit)
        fullname.value = "";
        username.value = "";
        phonenumber.value = "";
        email.value = "";
        address.value = "";
        password.value = "";
        confirmpassword.value = "";
    }
});
