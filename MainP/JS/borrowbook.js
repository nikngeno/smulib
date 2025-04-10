fetch("../DBQueries/book-data.php")
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        let table = document.querySelector(".book-items");

        data.forEach(bookData => {
            let book = document.createElement("div");
            book.classList.add("book");
            let title = document.createElement("h3");
            let cover = document.createElement("img");
            let price = document.createElement("p");

            title.innerText = bookData.Title;
            cover.src = `../${bookData.CoverImg}`;
            cover.alt = bookData.Title;
            price.innerText = `$${bookData.Price}`;

            book.appendChild(title);
            book.appendChild(cover);
            book.appendChild(price);

            table.appendChild(book);
        });
    })