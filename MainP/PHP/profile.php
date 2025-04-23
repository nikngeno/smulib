<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: sign_in.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SMU Library – Profile</title>

    <!-- ❶ Global styles first -->
    <link rel="stylesheet" href="../CSS/styles.css">

    <!-- ❷ Any other page-specific files that SHOULD override globals -->
    <link rel="stylesheet" href="CSS/team.css">

    <!-- ❸ PROFILE GRID –– must come LAST so nothing overrides it -->
    <link rel="stylesheet" href="../CSS/profile.css">
    
    <link rel="icon" href="saint-martin-university_track-field_saints_logo.png">
</head>
<body>

<?php include "header.php"; ?>

<h3>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h3>

<main class="profile-grid">

   
<form  class="profile-photo" 
       id="avatar-form" 
       action="PHP/upload_avatar.php" 
       method="POST" 
       enctype="multipart/form-data">

    <!-- current / fallback avatar -->
    <img id="avatar-preview"
         src="<?php echo htmlspecialchars($avatarPath ?? 'Imgs/usersphotos/Nick.jpg'); ?>"
         alt="Profile picture">

    <!-- hidden input -->
    <input type="file"
           name="avatar"
           id="avatar-input"
           accept="image/*"
           hidden>

    <!-- visible overlay button -->
    <label for="avatar-input" class="avatar-btn">
        Change&nbsp;photo
    </label>
</form>
<!-- ----------------------------------------------------------------- -->


    <div class="profile-details">
        <h2>Nicholas Ngeno</h2>
        <p><strong>Email:</strong> nick@example.com</p>
        <p><strong>Phone:</strong> +1 234 567 8901</p>
        <p><strong>Address:</strong> 123 Campus Way, Lacey WA</p>
    </div>

    <div class="profile-active">
        <h3>Active Loans</h3>
        <ul>
            <li><em>Clean Code</em> — Due 12 May 2025</li>
            <li><em>The Pragmatic Programmer</em> — Due 18 May 2025</li>
        </ul>
    </div>

    <div class="profile-history">
        <h3>Previously Borrowed</h3>
        <ul>
            <li><em>Design Patterns</em></li>
            <li><em>Introduction to Algorithms</em></li>
        </ul>
    </div>

</main>

<footer>
    <p>&copy; 2025 SMU Library</p>
</footer>

<script src="script.js"></script>
</body>
</html>
