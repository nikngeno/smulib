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
  <title>SMU Library</title>
  <link rel="icon" type="image" href="saint-martin-university_track-field_saints_logo.png" />
  <!-- Link to external CSS -->
  <link rel="stylesheet" href="CSS/styles.css">

  <!-- style for Meet the team page-->
  <link rel="stylesheet" href="CSS/team.css">
  <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
</head>
<body>

 <!-- Header and Navigation -->
 <?php include "header.php" ?>

  <main>
    <br>
    <br>
    <!-- Main Content Areas -->
    <h2 align ="center"><u>Meet The Team</u></h2>

<br>

<div class="row">
  <div class="column">
    <div class="card">
      <img src="Imgs/people_images/Amber.jpg" alt="Amber" style="width:100%">
      <div class="container">
        <h2>Amber Mattoni</h2>
        <p class="title">Library Support Staff</p>
        <p>Education Background:</p>
        <p>Bachelor of Science in Education</p>
        <p><strong>Expertise:</strong></p>
        <p>Front desk operations, assisting students and faculty with material checkouts and tech use.</p>
        <p>Known for organizing displays and creating welcoming spaces in the library.</p>
        <div>
          <button class="button"><a href="mailto:amber.mattoni@stmartin.edu">Email</a></button>
          <button class="button"><a href="tel:5551234567">Call</a></button>
        </div>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="Imgs/people_images/miguel.jpg" alt="Miguel" style="width:100%">
      <div class="container">
        <h2>Miguel Gomez</h2>
        <p class="title">Senior Librarian</p>
        <p>Education Background:</p>
        <p> Master of Library Science</p>
        <p><strong>Expertise:</strong></p>
        <p> Reader's advisory, cataloging systems, and information retrieval.</p>
        <p>Leads adult programming and manages literary events and book clubs. Oversees research support services, academic liaison work, and special collections.</p>
        <p></p>
        <div>
          <button class="button"><a href="mailto:miguel.gomez@stmartin.edu">Email</a></button>
          <button class="button"><a href="tel:5559876543">Call</a></button>
        </div>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="Imgs/people_images/Nick.jpg" alt="Nick" style="width:100%">
      <div class="container">
        <h2>Nicholas Ngeno</h2>
        <p class="title">Library Administrator</p>
        <p>Education Background:</p>
        <p>Bachelor of Arts in Public Administration</p>
        <p><strong>Expertise:</strong></p>
        <p>Library leadership, strategic planning, budget management, and staff development.</p>
        <p>Specializes in long-term planning and integration of digital systems in academic libraries.</p>
        <div>
          <button class="button"><a href="mailto:nicholas.ngeno@stmartin.edu">Email</a></button>
          <button class="button"><a href="tel:5552468101">Call</a></button>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
  <!-- Footer -->
  <footer>
    <p>&copy; 2025 SMU Library</p>
  </footer>

  <!-- Link to external JavaScript -->
  <script src="script.js"></script>
</body>
</html>