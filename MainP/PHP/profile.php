<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../sign_in.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SMU Library – Profile</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="CSS/team.css">
    <link rel="stylesheet" href="../CSS/profile.css">
    <link rel="icon" href="../Imgs/icon/saint-martin-university_track-field_saints_logo.png"/>
</head>
<body>

<?php include "header.php"; ?>

<h3 id="welcome-message">Loading profile...</h3>

<main class="profile-grid" id="profile-grid" style="display:none;">
<div class="profile-photo">
    <img src="../Imgs/usersphotos/Nick.jpg" alt="Profile Picture" style="width: 100%; max-width: 200px; border-radius: 10px;">
</div>

    <div class="profile-details">
        <h2 id="user-fullname"></h2>
        <p><strong>Email:</strong> <span id="user-email"></span></p>
        <p><strong>Phone:</strong> <span id="user-phone"></span></p>
        <p><strong>Address:</strong> <span id="user-address"></span></p>
    </div>
    <div class="profile-active">
        <h3>Active Loans</h3>
        <ul id="active-loans-list">
            <li>No current active books on profile.</li>
        </ul>
    </div>
    <div class="profile-history">
        <h3>Previously Borrowed</h3>
        <ul id="previously-borrowed-list"></ul>
    </div>
</main>

<!-- Sign-out button -->
<div style="text-align: center; margin: 20px;">
    <a href="logout.php" class="btn" style="padding: 10px 20px; background: #e00; color: white; text-decoration: none; border-radius: 5px;">Sign Out</a>
</div>

<footer>
    <p>&copy; 2025 SMU Library</p>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    fetch('fetch_profile.php')
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            const data = result.data;
            document.getElementById('welcome-message').innerText = `Welcome, ${data.username}!`;
            
            document.getElementById('user-fullname').innerText = data.fullName;
            document.getElementById('user-email').innerText = data.email;
            document.getElementById('user-phone').innerText = data.phone;
            document.getElementById('user-address').innerText = data.address;

            const historyList = document.getElementById('previously-borrowed-list');
            historyList.innerHTML = '';
            data.history.forEach(book => {
                historyList.innerHTML += `<li><em>${book}</em></li>`;
            });

            const activeLoansList = document.getElementById('active-loans-list');
            const borrowedBooks = JSON.parse(localStorage.getItem('borrowedBooks')) || [];
            if (borrowedBooks.length > 0) {
                activeLoansList.innerHTML = '';
                borrowedBooks.forEach(book => {
                    activeLoansList.innerHTML += `<li><em>${book.title}</em> by ${book.author} — Borrowed on ${book.borrowedOn}</li>`;
                });
            }

            document.getElementById('profile-grid').style.display = 'grid';
        } else {
            document.getElementById('welcome-message').innerText = 'Error loading profile.';
        }
    })
    .catch(() => {
        document.getElementById('welcome-message').innerText = 'Failed to load profile.';
    });
});
</script>

</body>
</html>
