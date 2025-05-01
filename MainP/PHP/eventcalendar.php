<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SMU Library</title>
  <link rel="icon" type="image" href="../Imgs/icon/saint-martin-university_track-field_saints_logo.png" />
  
  <!-- Link to external CSS -->
  <link rel="stylesheet" href="../CSS/eventcalendar.css">
  <link rel="stylesheet" href="../CSS/styles.css">
  <link rel="stylesheet" href="../CSS/team.css">
  <link rel="stylesheet" href="../CSS/header.css">
</head>
<body>
  
  <?php include '../PHP/header.php'; ?>
  
  <div class="calendar-wrap">
    
    <!-- Calendar Section -->
    <div class="calendar-body">
      <div class="month">      
        <ul>
          <li class="prev"><button type="button" id="prevButton">&#10094;</button></li>
          <li class="next"><button type="button" id="nextButton">&#10095;</button></li>
          <li id="monthYear">
            February<br>
            <span style="font-size:18px">2025</span>
          </li>
        </ul>
      </div>

      <ul class="weekdays">
        <li>Sun</li>
        <li>Mon</li>
        <li>Tues</li>
        <li>Wed</li>
        <li>Thur</li>
        <li>Fri</li>
        <li>Sat</li>
      </ul>

      <ul class="days" id="dates"></ul>
    </div>

    <!-- Events Section -->
    <div class="events-section" id="calendar-events-holder">
      <h2>Upcoming Events</h2>

      <div class="event-item">
        <div class="event-header">
          <span>Date-time</span>
          <span class="event-title">Event Title</span>
          <span>Location</span>
        </div>
        <div><p>Description</p></div>
      </div>

      <div class="event-item">
        <div class="event-header">
          <span>Date-time</span>
          <span class="event-title">Event Title</span>
          <span>Location</span>
        </div>
        <div><p>Description</p></div>
      </div>

      <div class="event-item">
        <div class="event-header">
          <span>Date-time</span>
          <span class="event-title">Event Title</span>
          <span>Location</span>
        </div>
        <div><p>Description</p></div>
      </div>

      <div class="event-item">
        <div class="event-header">
          <span>Date-time</span>
          <span class="event-title">Event Title</span>
          <span>Location</span>
        </div>
        <div><p>Description</p></div>
      </div>

      <div class="event-item">
        <div class="event-header">
          <span>Date-time</span>
          <span class="event-title">Event Title</span>
          <span>Location</span>
        </div>
        <div><p>Description</p></div>
      </div>
      
    </div> <!-- end of events-section -->
  </div> <!-- end of calendar-wrap -->

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 SMU Library</p>
  </footer>

  <!-- JavaScript -->
  <script src="../script.js"></script>
  <script src="../JS/javascriptCalendar.js"></script>
</body>
</html>
