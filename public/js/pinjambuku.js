// Mengambil elemen-elemen form
const judulInput = document.getElementById("judulauthor");
const suggestionList = document.getElementById("suggestion-list");
const submitButton = document.getElementById("submitBtn");
const form = document.getElementById("pinjamBuku");

// Toast notifikasi menggunakan SweetAlert2
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    },
});

