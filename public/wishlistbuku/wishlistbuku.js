document.querySelectorAll('.book').forEach(book => {
    book.addEventListener('click', function(event) {
        if (event.target.tagName === 'BUTTON') return;
        const url = this.getAttribute('data-url');
        window.location.href = url;
    });
});
