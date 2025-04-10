<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SMU Library</title>
  <link rel="icon" type="image" href="saint-martin-university_track-field_saints_logo.png" />
  <!-- Link to external CSS -->
  <link rel="stylesheet" href="../CSS/styles.css">
  <link rel="stylesheet" href="../CSS/appointment.css">
  <link rel="stylesheet" href="../CSS/requestlibrarian.css">

</head>
<body>

  <!-- Header and Navigation -->
  <?php include "header.php" ?>

  <!-- Main Content Areas -->
  <main class="librarian-request-container">
    <h2>Meet Our Librarians</h2>
    <p>Select a librarian below to book a research support session.</p>
  
    <div class="librarian-gallery">
      <!-- Librarian Card -->
      <div class="librarian-card" onclick="showLibrarianDetails('lib1')">
        <img src="../Imgs/Librarians/sarah.png" alt="Librarian Sarah">
        <h3>Sarah Johnson</h3>
        <p>Specialty: Literature & Humanities</p>
      </div>
  
      <div class="librarian-card" onclick="showLibrarianDetails('lib2')">
        <img src="../Imgs/Librarians/David.png" alt="Librarian David">
        <h3>David Lee</h3>
        <p>Specialty: Science & Technology</p>
      </div>
  
      <div class="librarian-card" onclick="showLibrarianDetails('lib3')">
        <img src="../Imgs/Librarians/Maria.png" alt="Librarian Maria">
        <h3>Maria Kim</h3>
        <p>Specialty: Social Sciences</p>
      </div>
  
      <div class="librarian-card" onclick="showLibrarianDetails('lib4')">
        <img src="../Imgs/Librarians/James.png" alt="Librarian James">
        <h3>James Blake</h3>
        <p>Specialty: Business & Economics</p>
      </div>
  
      <div class="librarian-card" onclick="showLibrarianDetails('lib5')">
        <img src="../Imgs/Librarians/Amina.png" alt="Librarian Amina">
        <h3>Amina Yusuf</h3>
        <p>Specialty: Health & Nursing</p>
      </div>
    </div>
  
   <!-- Librarian Detail Modal -->
<div id="librarianModal" class="modal hidden">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal()">&times;</span>
      <img id="modal-image" src="" alt="Librarian Photo">
      <h3 id="modal-name"></h3>
      <p><strong>Specialty:</strong> <span id="modal-specialty"></span></p>
      <p><strong>About:</strong> <span id="modal-bio"></span></p>
      <button onclick="redirectToLibrarianCalendar()">Book a Session</button>
    </div>
  </div>
  
  </main>
  
  

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 SMU Library</p>
  </footer>

  <!-- Link to external JavaScript -->
  <script src="../JS/requestlibrarian.js"></script>
  <script src="../JS/script.js"></script>
</body>
</html>
