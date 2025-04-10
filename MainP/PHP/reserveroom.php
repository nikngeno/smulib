<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SMU Library</title>
  <link rel="icon" type="image" href="saint-martin-university_track-field_saints_logo.png" />
  <!-- Link to external CSS -->
  <link rel="stylesheet" href="../CSS/styles.css">
  <link rel="stylesheet" href="../CSS/appointment.css">
  <link rel="stylesheet" href="../CSS/reserveroom.css">

</head>
<body>

  <!-- Header and Navigation -->
  <?php include "header.php" ?>

  <!-- Main Content Areas -->
  <main class="room-reservation-container">
    <h2>Reserve a Study Room</h2>
    <div class="room-gallery">
      <!-- Example Room Card -->
      <div class="room-card" onclick="showRoomDetails('room1')">
        <img src="../Imgs/room_images/room1.png" alt="Study Room 1">
        <h3>Room A</h3>
      </div>
      <div class="room-card" onclick="showRoomDetails('room2')">
        <img src="../Imgs/room_images/room2.png" alt="Study Room 2">
        <h3>Room B</h3>
      </div>
      <!-- Add more rooms as needed -->
    </div>
  
    <!-- Room Detail Section (Dynamic) -->
    <div id="room-details" class="room-details hidden">
      <h3 id="room-title"></h3>
      <p><strong>Capacity:</strong> <span id="room-capacity"></span></p>
      <p><strong>Floor:</strong> <span id="room-floor"></span></p>
      <p><strong>Description:</strong> <span id="room-description"></span></p>
      <button id="book-btn" onclick="redirectToCalendar()">Book This Room</button>
    </div>
  </main>
  
  

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 SMU Library</p>
  </footer>

  <!-- Link to external JavaScript -->
  <script src="../JS/reserveroom.js"></script>
  <script src="../JS/script.js"></script>
</body>
</html>
