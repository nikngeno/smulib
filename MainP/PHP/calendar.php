<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SMU Library</title>
  <link rel="icon" type="image" href="saint-martin-university_track-field_saints_logo.png" />
  <!-- Link to external CSS -->
  <link rel="stylesheet" href="../CSS/styles.css">
  <!-- New stylesheet for your books layout -->
  <link rel="stylesheet" href="../CSS/book.css">
  <link rel="stylesheet" href="../CSS/search.css">
  <link rel="stylesheet" href="../CSS/sidebar.css">
  <script src ="../JS/cart.js" async></script>

  <style>
    .top-header {
        background-color: #ba0c2f; /* Solid color */
        color: #ffffff;
        margin-bottom: 30px;
        padding: 20px;
        text-align: center;
    }

    * {
      box-sizing: border-box;
    }

    ul {
      list-style-type: none;
    }

    body {
      font-family: Merriweather;
      padding: 0;
    }

    .month {
      padding: 25px;
      width: 100%;
      background: #ba0c2f;
      text-align: center;
    }

    .month ul {
      margin: 0;
      padding: 0;
    }

    .month ul li {
      color: #ffffff;
      font-size: 20px;
      text-transform: uppercase;
      letter-spacing: 3px;
    }

    .month .prev {
      float: left;
      padding-top: 10px;
    }

    .month .next {
      float: right;
      padding-top: 10px;
    }

    .weekdays {
      margin: 0;
      padding: 10px 0;
      background-color: #a7a7a7;
    }

    .weekdays li {
      display: inline-block;
      width: 13.6%;
      color: #ffffff;
      text-align: center;
    }

    .days {
      padding: 10px 0;
      background: #ffffff;
      margin: 0;
    }

    .days li {
      list-style-type: none;
      display: inline-block;
      width: 13.6%;
      text-align: center;
      margin-bottom: 5px;
      font-size:12px;
      color: #808285;
    }

    .days li .active {
      padding: 5px;
      background: #ba0c2f;
      color: #ffffff !important
    }

    .calendar-body {
      width: 500px;
    }

    .calendar-wrap {
      display: flex;
      justify-content: center;
      gap : 70px;
      margin: 50px auto;
    }

    .event-item {
      background-color: #f2f2f2;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
      width: 500px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .event-title {
      font-weight: bold;
    }

    .event-header > :last-child {
      float: right;
    }

    /* Add media queries for smaller screens */
    @media screen and (max-width:720px) {
      .weekdays li, .days li {width: 13.1%;}
    }

    @media screen and (max-width: 420px) {
      .weekdays li, .days li {width: 12.5%;}
      .days li .active {padding: 10px;}
    }

    @media screen and (max-width: 290px) {
      .weekdays li, .days li {width: 12.2%;}
    }
  </style>
</head>
<body>
  <!-- Header and Navigation -->
  <?php include "header.php" ?>

  <!-- Calendar -->
  <!--/*<header class="top-header">
    <h1>SMU Library Calendar</h1>
  </header>*/-->
  <div class = "calendar-wrap"> 
    <div class="calendar-body">
      <div class="month">      
        <ul>
          <li class="prev"><button type="button">&#10094;</button></li>
          <li class="next"><button type="button">&#10095;</button></li>
          <li>
            February<br>
            <span style="font-size:18px">2025</span>
          </li>
        </ul>
      </div>
      
      <ul class="weekdays">
        <li>Sunday</li>
        <li>Monday</li>
        <li>Tuesday</li>
        <li>Wednesday</li>
        <li>Thursday</li>
        <li>Friday</li>
        <li>Saturday</li>
      </ul>
      
      <ul class="days">  
        <li>1</li>
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
        <li>31</li>
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

  <script src="../JS/calendar.js"></script>
</body>
</html>
