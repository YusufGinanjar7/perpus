function navigateToPage() {
    const userMenu = document.getElementById("userMenu");
    const selectedValue = userMenu.value;

    // Pastikan pengguna memilih opsi valid
    if (selectedValue !== "logout") {
      window.location.href = selectedValue; // Redirect ke halaman yang dipilih
    }
  }

  document.querySelectorAll('.book').forEach(book => {
    book.addEventListener('click', function(event) {
        if (event.target.tagName === 'BUTTON') return;
        const url = this.getAttribute('data-url');
        window.location.href = url;
    });
});
