<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SMU Library</title>
  <link rel="icon" type="image" href="saint-martin-university_track-field_saints_logo.png" />
  <!-- Link to external CSS -->
  <link rel="stylesheet" href="../CSS/styles.css">
  <link rel="stylesheet" href="../CSS/appointment.css">
  <link rel="stylesheet" href="../CSS/librariancalendar.css">

</head>
<body>

  <!-- Header and Navigation -->
  <?php include "header.php" ?>

  <!-- Main Content Areas -->
  <main class="calendar-container">
    <h2 id="calendar-librarian-name">Librarian Availability</h2>
    <div class="calendar-table">
      <table>
        <thead>
          <tr>
            <th>Time</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
          </tr>
        </thead>
        <tbody id="calendar-body">
          <!-- Rows injected by JS -->
        </tbody>
      </table>
    </div>
  </main>

  
  

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 SMU Library</p>
  </footer>

  <!-- Link to external JavaScript -->
  <script src="../JS/librariancalendar.js"></script>
  <script src="../JS/script.js"></script>
</body>
</html>
