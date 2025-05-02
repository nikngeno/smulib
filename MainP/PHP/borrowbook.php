<?php
// borrowbook.php

// 1) Connect to your database
$conn = new mysqli('localhost', 'root', '', 'smulib');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// 2) Include the reusable query function
require_once __DIR__ . '/search_books.php';

// 3) Grab the GET parameters
$searchType = $_GET['search-type'] ?? '';
$query      = trim($_GET['q'] ?? '');

// 4) If there's a query, fetch matching books
$books = [];
if ($query !== '') {
    $books = searchBooks($conn, $searchType, $query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SMU Library – Borrow a Book</title>
  <link rel="stylesheet" href="../CSS/styles.css">
  <link rel="stylesheet" href="../CSS/bookwrapper.css">
  <link rel="stylesheet" href="../CSS/book.css">
  <link rel="stylesheet" href="../CSS/search.css">
  <link rel="stylesheet" href="../CSS/sidebar.css">
  <script src="../JS/cart.js" async></script>
  <script src="../JS/addToCart.js" async></script>
</head>
<body>

<?php include "header.php"; ?>

<div class="main-block">
  <!-- Search bar -->
  <div class="search-bar">
    <h2>Search the Library Catalog</h2>
    <form action="borrowbook.php" method="GET" class="search-form">
      <select id="search-type" name="search-type">
        <option value="keyword" <?= $searchType=='keyword'? 'selected':'' ?>>Keyword</option>
        <option value="title" <?= $searchType=='title'? 'selected':'' ?>>Title</option>
        <option value="author" <?= $searchType=='author'? 'selected':'' ?>>Author</option>
        <option value="genre" <?= $searchType=='genre'? 'selected':'' ?>>Genre</option>
      </select>
      <input type="text" id="search-input" name="q" placeholder="Find books, ebooks and more" value="<?= htmlspecialchars($query) ?>">
      <button type="submit" class="search-button">Search</button>
    </form>
  </div>

  <!-- Sidebar -->
  <?php $activeGenre = ($searchType === 'genre' ? $query : ''); ?>
  <aside class="sidebar">
    <h3>Browse Categories</h3>
    <ul>
      <?php
        $genres = ['Biography & Memoir','Business','Cooking',
                   'Fantasy, Horror & Sci‑Fi','Historical Fiction',
                   'Literary Fiction','Mystery & Thriller'];
        foreach ($genres as $g):
          $urlQ = urlencode($g);
          $cls  = ($activeGenre === $g ? 'active' : '');
      ?>
      <li>
        <a href="borrowbook.php?search-type=genre&amp;q=<?= $urlQ ?>" class="<?= $cls ?>">
          <?= htmlspecialchars($g) ?>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </aside>

  <!-- Book listings -->
  <div class="book-content">
    <table class="book-table">
      <?php if ($query === ''): ?>
        <!-- STATIC rows -->
        <td colspan="5" class="row-heading">New Additions</td>
      </tr>
      <tr>
        <!-- 5 columns of books in the first row -->
        <td>
          <h3 class="book-title">The Partner</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/ThePartner.png" alt="Book 1" class="book-image" />
          <div class="book-details">
            <p class="price">$9.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button type="button" class="book-action-button-buy">Buy Book</button>
            <button type="button" class="book-action-button">Borrow</button>
          </div>
        </td>
        <td>
          <h3 class="book-title">The Professor</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/professor.jpg" alt="Book 2" class="book-image" />
          <div class="book-details">
            <p class="price">$12.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button class="book-action-button-buy">Buy Book</button>
            <button class="book-action-button">Borrow</button>
          </div>
        </td>
        <td>
          <h3 class="book-title">The Wise Man's Fear</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/wise.jpg" alt="Book 3" class="book-image" />
          <div class="book-details">
            <p class="price">$14.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button class="book-action-button-buy">Buy Book</button>
            <button class="book-action-button">Borrow</button>
          </div>
        </td>
        <td>
          <h3 class="book-title"> The Name of the Wind</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/wind.jpg" alt="Book 4" class="book-image" />
          <div class="book-details">
            <p class="price">$8.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button class="book-action-button-buy">Buy Book</button>
            <button class="book-action-button">Borrow</button>
          </div>
        </td>
        <td>
          <h3 class="book-title"> To Read</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/read.png" alt="Book 5" class="book-image" />
          <div class="book-details">
            <p class="price">$19.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button class="book-action-button-buy">Buy Book</button>
            <button class="book-action-button">Borrow</button>
          </div>
        </td>
      </tr>

      <!-- Row heading: Most Borrowed -->
      <tr>
        <td colspan="5" class="row-heading">Most Borrowed</td>
      </tr>
      <tr>
        <!-- 5 columns of books in the second row -->
        <td>
          <h3 class="book-title"> When we Flew away</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/flew.png" alt="Book 6" class="book-image" />
          <div class="book-details">
            <p class="price">$10.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button class="book-action-button-buy">Buy Book</button>
            <button class="book-action-button">Borrow</button>
          </div>
        </td>
        <!-- Repeat similar structure for columns 2-5 in this row -->
        <td>
          <h3 class="book-title"> Truth and Lies</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/TruthAndLies.jpg" alt="Book 6" class="book-image" />
          <div class="book-details">
            <p class="price">$10.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button class="book-action-button-buy">Buy Book</button>
            <button class="book-action-button">Borrow</button>
          </div>
        </td>
        <td>
          <h3 class="book-title"> Ripped from the Healines</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/ripped.jpg" alt="Book 6" class="book-image" />
          <div class="book-details">
            <p class="price">$10.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button class="book-action-button-buy">Buy Book</button>
            <button class="book-action-button">Borrow</button>
          </div>
        </td>
        <td>
          <h3 class="book-title"> Beneath a Scarlet Sky</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/sky.jpg" alt="Book 6" class="book-image" />
          <div class="book-details">
            <p class="price">$10.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button class="book-action-button-buy">Buy Book</button>
            <button class="book-action-button">Borrow</button>
          </div>
        </td>
        <td>
          <h3 class="book-title"> The Friend</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/friend.jpg" alt="Book 6" class="book-image" />
          <div class="book-details">
            <p class="price">$10.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button class="book-action-button-buy">Buy Book</button>
            <button class="book-action-button">Borrow</button>
          </div>
        </td>
      </tr>

      <!-- Row heading: Most Liked -->
      <tr>
        <td colspan="5" class="row-heading">Most Liked</td>
      </tr>
      <tr>
        <!-- 5 columns of books in the third row -->
        <td>
          <h3 class="book-title"> Unstoppable Confidence</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/confidence.jpg" alt="Book 6" class="book-image" />
          <div class="book-details">
            <p class="price">$10.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button class="book-action-button-buy">Buy Book</button>
            <button class="book-action-button">Borrow</button>
          </div>
        </td>
        <!-- Repeat similar structure for columns 2-5 in this row -->
        <td>
          <h3 class="book-title"> Java Programming</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/java.jpg" alt="Book 6" class="book-image" />
          <div class="book-details">
            <p class="price">$10.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button class="book-action-button-buy">Buy Book</button>
            <button class="book-action-button">Borrow</button>
          </div>
        </td>
        <td>
          <h3 class="book-title"> Python for Kids</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/python.jpg" alt="Book 6" class="book-image" />
          <div class="book-details">
            <p class="price">$10.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button class="book-action-button-buy">Buy Book</button>
            <button class="book-action-button">Borrow</button>
          </div>
        </td>
        <td>
          <h3 class="book-title"> React Native</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/react.png" alt="Book 6" class="book-image" />
          <div class="book-details">
            <p class="price">$10.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button class="book-action-button-buy">Buy Book</button>
            <button class="book-action-button">Borrow</button>
          </div>
        </td>
        <td>
          <h3 class="book-title"> The C Programming Language</h3>
          <h2 class="book-author">John Grisham</h2>
          <img src="../Imgs/BookCovers/c.jpg" alt="Book 6" class="book-image" />
          <div class="book-details">
            <p class="price">$10.99</p>
            <!-- <p class="rating">★★★★☆</p>-->
            <button class="book-action-button-buy">Buy Book</button>
            <button class="book-action-button">Borrow</button>
          </div>
        </td>
        </tr>
      <?php else: ?>
        <!-- DYNAMIC results -->
        <tr><td colspan="5" class="row-heading"><?= count($books) ?> Results for “<?= htmlspecialchars($query) ?>”</td></tr>
        <?php foreach ($books as $b): ?>
          <tr><td colspan="5">
            <div class="search-result-item">
              <h3 class="book-title"><?= htmlspecialchars($b['title']) ?></h3>
              <h2 class="book-author"><?= htmlspecialchars($b['author']) ?></h2>
              <img src="<?= htmlspecialchars($b['cover_path']) ?>" class="book-image"/>
              <div class="book-details">
                <p class="price">$<?= number_format($b['price'],2) ?></p>
                <p class="summary"><?= nl2br(htmlspecialchars($b['summary'])) ?></p>
                <button class="book-action-button-buy">Buy Book</button>
                <button class="book-action-button">Borrow</button>
              </div>
            </div>
          </td></tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </table>
  </div>
</div>

<!-- Toast container -->
<div id="toast" style="
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #4CAF50;
    color: white;
    text-align: center;
    border-radius: 5px;
    padding: 16px;
    position: fixed;
    z-index: 1000;
    left: 50%;
    bottom: 30px;
    font-size: 17px;">
</div>

<!-- Toast & cart/borrow scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const buyButtons = document.querySelectorAll('.book-action-button-buy');
    buyButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const bookContainer = this.closest('td');
            const title = bookContainer.querySelector('.book-title').innerText;
            const author = bookContainer.querySelector('.book-author').innerText;
            const priceText = bookContainer.querySelector('.price').innerText;
            const price = parseFloat(priceText.replace('$', ''));
            const imgSrc = bookContainer.querySelector('.book-image').src;
            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            const alreadyExists = cartItems.some(item => item.title === title && item.author === author);
            if (alreadyExists) { showToast('Book is already in your cart!'); return; }
            cartItems.push({ title, author, price, imgSrc, quantity: 1 });
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            showToast('Book added to cart!');
        });
    });
    function showToast(message) {
        const toast = document.getElementById('toast');
        toast.innerText = message;
        toast.style.visibility = 'visible'; toast.style.opacity = '1';
        setTimeout(() => toast.style.opacity = '0', 2000);
        setTimeout(() => toast.style.visibility = 'hidden', 2500);
    }
});
</script>
<script>
function updateCartBadge() {
    const badge = document.getElementById('cart-count-badge');
    badge && (badge.innerText = (JSON.parse(localStorage.getItem('cartItems')) || []).length);
}
document.addEventListener('DOMContentLoaded', updateCartBadge);
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const borrowButtons = document.querySelectorAll('.book-action-button');
    borrowButtons.forEach(button => {
        button.addEventListener('click', function() {
            const bookContainer = this.closest('td');
            const title = bookContainer.querySelector('.book-title').innerText;
            const author = bookContainer.querySelector('.book-author').innerText;
            let borrowedBooks = JSON.parse(localStorage.getItem('borrowedBooks')) || [];
            if (borrowedBooks.some(b => b.title===title && b.author===author)) { showToast('You have already borrowed this book!'); return; }
            borrowedBooks.push({ title, author, borrowedOn: new Date().toLocaleDateString() });
            localStorage.setItem('borrowedBooks', JSON.stringify(borrowedBooks));
            showToast(`Borrowed "${title}" successfully!`);
        });
    });
    function showToast(message) {
        const toast = document.getElementById('toast');
        toast.innerText = message;
        toast.style.visibility = 'visible'; toast.style.opacity = '1';
        setTimeout(() => toast.style.opacity = '0', 2000);
        setTimeout(() => toast.style.visibility = 'hidden', 2500);
    }
});
</script>
</body>
</html>
