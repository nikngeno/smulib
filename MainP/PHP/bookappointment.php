<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SMU Library</title>
  <link rel="icon" type="image" href="saint-martin-university_track-field_saints_logo.png" />
  <!-- Link to external CSS -->
  <link rel="stylesheet" href="../CSS/styles.css">
  <link rel="stylesheet" href="../CSS/appointment.css">

</head>
<body>

  <!-- Header and Navigation -->
  <?php include "header.php" ?>

  <!-- Main Content Areas -->
  <main class="appointment-container">
    <h2>Book an Appointment</h2>
    <form class="appointment-form" action="../DBQueries/appointment.php" method="POST">
      <label for="appointment-type">Appointment Type</label>
      <select id="appointment-type" required>
        <option value="">-- Please select --</option>
        <option value="study-room">Study Room Reservation</option>
        <option value="tech-help">Tech Help</option>
        <option value="event">Event Registration</option>
        <option value="peer-help">Tutoring / Peer Help</option>
      </select>
  
      <label for="date">Preferred Date</label>
      <input type="date" id="date" name="AppointmentDate" required>
  
      <label for="time">Preferred Time</label>
      <input type="time" id="time" name="AppointmentTime" required>
  
      <label for="location">Location / Room (optional)</label>
      <input type="text" id="location" placeholder="e.g., Room A1 or Online" name="Location">
  
      <label for="name">Full Name</label>
      <input type="text" id="name" name="Name" required>
  
      <label for="email">Email Address</label>
      <input type="email" id="email" name="Email" required>
  
      <label for="card">Library Card Number</label>
      <input type="text" id="card" name="LibraryCardNumber" required>
  
      <label for="notes">Additional Notes (optional)</label>
      <textarea id="notes" rows="4" placeholder="Any specific needs or info?" name="Comments"></textarea>
  
      <label class="terms">
        <input type="checkbox" required> I accept the appointment policy and terms.
      </label>
  
      <button type="submit">Submit Appointment</button>
    </for>
  </main>
  

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 SMU Library</p>
  </footer>

  <!-- Link to external JavaScript -->
  <script src="script.js"></script>
  <script>
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === '1') {
      const msg = document.createElement('p');
      msg.style.color = 'green';
      msg.textContent = 'Your appointment has been booked successfully!';
      document.querySelector('.appointment-container').prepend(msg);
    }
  </script>
  
</body>
</html>
