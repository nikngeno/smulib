document.addEventListener('DOMContentLoaded', function() {
    // Get all the Buy Book buttons
    const buyButtons = document.querySelectorAll('.book-action-button-buy');

    buyButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Find the closest <td> container of the clicked button
            const bookContainer = this.closest('td');

            // Get the book details
            const title = bookContainer.querySelector('.book-title').innerText;
            const author = bookContainer.querySelector('.book-author').innerText;
            const priceText = bookContainer.querySelector('.price').innerText;
            const price = parseFloat(priceText.replace('$', ''));
            const imgSrc = bookContainer.querySelector('.book-image').src;

            // Save the book details to localStorage
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

            cartItems.push({
                title: title,
                author: author,
                price: price,
                imgSrc: imgSrc,
                quantity: 1
            });

            localStorage.setItem('cartItems', JSON.stringify(cartItems));

            // Redirect to the cart page
            window.location.href = './maincart.html';
        });
    });
});
