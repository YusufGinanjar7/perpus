
document.querySelectorAll('.wishlist').forEach(button => { 
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default form submission or unintended behavior hallo world
        const bookId = this.getAttribute('data-book-id');
        const finalUrl = wishlistAddUrl.replace(/\/$/, '') + `/${bookId}`;
        
        fetch(finalUrl, { 
            method: 'POST',
            headers: { 
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({}),
        })
        .then(async response => {
            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.message || 'Error processing request');
            }
            return response.json();
        })
        .then(data => {
            alert(data.message || 'Successfully added to wishlist');
        })
        .catch(error => {
            console.error('Error:', error.message);
            alert('Failed to add to wishlist');
        });
    });
});
