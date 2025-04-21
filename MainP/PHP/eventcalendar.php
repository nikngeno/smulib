<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SMU Library</title>
  <link rel="icon" type="image" href="saint-martin-university_track-field_saints_logo.png" />
  <!-- Link to external CSS -->
  <link rel="stylesheet" href="CSS/styles.css">
  <link rel="stylesheet" href="CSS/eventcalendar.css">
 
  <!-- style for Meet the team page-->
  <link rel="stylesheet" href="CSS/team.css">
</head>
<body>
 
  <?php include 'header.php'; ?>
    <br>
    <div class = "calendar-wrap">
      <div class="calendar-body">
        <div class="month">      
          <ul>
            <li class="prev"><button type="button" id= "prevButton" >&#10094;</button></li>
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
       
        <ul class="days" id="dates">  
          <!-- <li>1</li>
          <li>2</li>
          <li>3</li>
          <li>4</li>
          <li>5</li>
          <li>6</li>
          <li>7</li>
          <li>8</li>
          <li>9</li>
          <li>10</li>
          <li>11</li>
          <li>12</li>
          <li>13</li>
          <li>14</li>
          <li>15</li>
          <li>16</li>
          <li><span class="active">17</span></li>
          <li>18</li>
          <li>19</li>
          <li>20</li>
          <li>21</li>
          <li>22</li>
          <li>23</li>
          <li>24</li>
          <li>25</li>
          <li>26</li>
          <li>27</li>
          <li>28</li>
          <li>29</li>
          <li>30</li>
          <li>31</li> -->
         </ul>
       </div>
      <div class = "calendar-events">
        <h2>Upcoming Events</h2>
        <div class="event-item">
          <div class="event-header">
            <span >Date-time</span>
            <span class="event-title">Event Title</span>
            <span>Location</span>
          </div>
          <div><p>Description</p></div>
        </div>
 
        <div class="event-item">
          <div class="event-header">
            <span >Date-time</span>
            <span class="event-title">Event Title</span>
            <span>Location</span>
          </div>
          <div><p>Description</p></div>
        </div>
         
        <div class="event-item">
          <div class="event-header">
            <span >Date-time</span>
            <span class="event-title">Event Title</span>
            <span>Location</span>
          </div>
            <div><p>Description</p></div>
        </div>
 
          <div class="event-item">
            <div class="event-header">
              <span >Date-time</span>
              <span class="event-title">Event Title</span>
              <span>Location</span>
            </div>
            <div><p>Description</p></div>
          </div>
 
          <div class="event-item">
            <div class="event-header">
              <span >Date-time</span>
              <span class="event-title">Event Title</span>
              <span>Location</span>
            </div>
            <div><p>Description</p></div>
          </div>
 
        </div>
      </div>
    </div>
 
  <!-- Footer -->
  <footer>
    <p>&copy; 2025 SMU Library</p>
  </footer>
 
  <!-- Link to external JavaScript -->
  <script src="script.js"></script>
  <script src="JS/javascriptCalendar.js"></script>
</body>
</html>