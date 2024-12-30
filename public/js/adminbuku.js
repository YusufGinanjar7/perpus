document.addEventListener("DOMContentLoaded", function () {
    const formContainer = document.getElementById("formContainer");
    const searchInput = document.getElementById("searchInput");
    const searchButton = document.getElementById("searchButton");
    const categorySelect = document.getElementById("categorySelect");
    const bookTableBody = document.getElementById("bookTableBody");
    window.openForm = openForm;
    window.closeForm = closeForm;
    window.openEditModal = openEditModal;

    // Tampilkan form tambah buku
    function openForm() {
        // Reset form untuk Tambah Buku
        const bookForm = document.getElementById("bookForm");
        bookForm.reset();
        document.getElementById("bookModalLabel").innerText = "Tambah Buku";
        bookForm.action = "/dashboard/books"; // URL untuk tambah buku
        bookForm.method = "POST";

        // Hapus input hidden "_method" jika ada
        const methodInput = bookForm.querySelector('input[name="_method"]');
        if (methodInput) methodInput.remove();

        // Reset semua genre checkbox
        const genreCheckboxes = document.querySelectorAll('input[name="genre[]"]');
        genreCheckboxes.forEach(checkbox => (checkbox.checked = false));

        formContainer.classList.add("active");
    }

    function closeForm() {
        formContainer.classList.remove("active");
    }

    // Pencarian buku
    searchButton.addEventListener("click", () => {
        const query = searchInput.value.toLowerCase();
        const rows = bookTableBody.querySelectorAll("tr");

        rows.forEach(row => {
            const title = row.cells[0].textContent.toLowerCase();
            row.style.display = title.includes(query) ? "" : "none";
        });
    });

    // Filter berdasarkan kategori
    categorySelect.addEventListener("change", () => {
        const selectedCategory = categorySelect.value;
        const rows = bookTableBody.querySelectorAll("tr");

        rows.forEach(row => {
            const genre = row.cells[2].textContent;
            row.style.display = genre.includes(selectedCategory) || selectedCategory === "Kategori" ? "" : "none";
        });
    });

    function openEditModal(id, title, author, publishedYear, publisher, availableCopies, totalCopies, price, synopsis) {
        openForm(); // Tampilkan form

        document.getElementById("bookModalLabel").innerText = "Edit Buku";

        // Isi form dengan data buku
        document.getElementById("title").value = title;
        document.getElementById("author").value = author;
        document.getElementById("published_year").value = publishedYear;
        document.getElementById("publisher").value = publisher;
        document.getElementById("available_copies").value = availableCopies;
        document.getElementById("total_copies").value = totalCopies;
        document.getElementById("price").value = price;
        document.getElementById("synopsis").value = synopsis;

        // Ubah URL action form untuk Edit Buku
        const bookForm = document.getElementById("bookForm");
        bookForm.action = `/dashboard/books/update/${id}`; // URL untuk update
        bookForm.method = "POST";

        // Tambahkan input hidden untuk HTTP PUT
        if (!bookForm.querySelector('input[name="_method"]')) {
            const hiddenMethod = document.createElement("input");
            hiddenMethod.type = "hidden";
            hiddenMethod.name = "_method";
            hiddenMethod.value = "PUT"; // Gunakan PUT untuk update
            bookForm.appendChild(hiddenMethod);
        }
    }
});
