// Fungsi untuk membuka modal Edit User
function openEditModal(id, username, phoneNumber, address) {
    // Ubah title modal
    document.getElementById('editUserModalLabel').innerText = 'Edit User';

    // Isi form dengan data user
    document.getElementById('username').value = username;
    document.getElementById('phone_number').value = phoneNumber;
    document.getElementById('address').value = address;
    document.getElementById('password').value = ''; // Kosongkan password

    // Set action form untuk update user
    const form = document.getElementById('editForm');
    form.action = `/dashboard/users/${id}`;

    // Tampilkan modal
    const modal = new bootstrap.Modal(document.getElementById('editUserModal'));
    modal.show();
}

setTimeout(() => {
    const alert = document.getElementById('success-alert');
    if (alert) {
        alert.classList.add('hide'); // Tambahkan kelas untuk animasi menghilang
        setTimeout(() => alert.remove(), 500); // Hapus elemen setelah transisi selesai
    }
}, 3000);

// Reset modal setelah ditutup
document.querySelector('.btn-close').addEventListener('click', () => {
    const form = document.getElementById('editForm');
    form.reset(); // Hapus data lama
});
