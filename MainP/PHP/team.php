<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SMU Library</title>
  <link rel="icon" type="image" href="saint-martin-university_track-field_saints_logo.png" />

  <!-- Link to external CSS -->
  <link rel="stylesheet" href="../CSS/styles.css">
  <link rel="stylesheet" href="../CSS/header.css">

  <!-- style for Meet the team page-->

  <style>
    html {
      box-sizing: border-box;
    }
    
    *, *:before, *:after {
      box-sizing: inherit;
    }
    
    .column {
      float: left;
      width: 33.3%;
      margin-bottom: 16px;
      padding: 0 8px;
    }
    
    @media screen and (max-width: 650px) {
      .column {
        width: 100%;
        display: block;
      }
    }
    
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

  .card img {
  width: 200px;
  height: 200px;
  object-fit: contain;
}

    
    .container {
      padding: 0 16px;
    }
    
    .container::after, .row::after {
      content: "";
      clear: both;
      display: table;
    }
    
    .title {
      color: grey;
    }
    
    .button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 8px;
      margin: 4px;
      color: white;
      background-color: black;
      cursor: pointer;
    }
    .button * {
      text-decoration: none;
      color: inherit;
    }
    
    .button:hover {
      background-color: gray;
    } 

    .popup {
      position: fixed; /* pop-up stays fixed on the viewport */
      top: 50%; /* positions vertically centered */
      left: 50%; /* positions horizontally centered */
      transform: translate(-50%, -50%); /* fine-tunes exact centering */
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
      z-index: 1000;
      display: none; /* initially hidden */
    }
    </style>

</head>
<body>

  <!-- Header and Navigation -->
  <?php include "header.php" ?>

  
    <!-- Main Content Areas -->
    <h2 align ="center">Meet The Team</h2>

<br>

<div class="row">
  <div class="column">
    <div class="card">
      <img src="../Imgs/people_images/Amber.jpg" alt="Amber" style="width:100%">
      <div class="container">
        <h2>Amber Mattoni</h2>
        <p class="title">Library Support Staff</p>
        <p>Education Background:</p>
        <p>Bachelor of Science in Education</p>
        <p>Expertise:</p>
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
      <img src="../Imgs/people_images/miguel.jpg" alt="Miguel" style="width:100%">
      <div class="container">
        <h2>Miguel Gomez</h2>
        <p class="title">Senior Librarian</p>
        <p>Education Background:</p>
        <p> Master of Library Science</p>
        <p>Expertise:</p>
        <p> Reader's advisory, cataloging systems, and information retrieval.</p>
        <p>Leads adult programming and manages literary events and book clubs.</p>
        <p>Oversees research support services, academic liaison work, and special collections.</p>
        <div>
          <button class="button"><a href="mailto:miguel.gomez@stmartin.edu">Email</a></button>
          <button class="button"><a href="tel:5559876543">Call</a></button>
        </div>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="../Imgs/people_images/Nick.jpg" alt="Nick" style="width:100%">
      <div class="container">
        <h2>Nicholas Ngeno</h2>
        <p class="title">Library Administrator</p>
        <p>Education Background:</p>
        <p>Bachelor of Arts in Public Administration</p>
        <p>Expertise:</p>
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

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 SMU Library</p>
  </footer>

  <!-- Link to external JavaScript -->
  <script src="../JS/script.js"></script>
</body>
</html>