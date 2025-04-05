<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>SMU Library</title>
  <link rel="icon" type="image" href="saint-martin-university_track-field_saints_logo.png" />
  <!-- Link to external CSS -->
  <link rel="stylesheet" href="../CSS/styles.css">
  <!-- Grid for placing form and opening hours side by side -->
  <style>
    .grid-container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      /* two equal columns */
      gap: 70px;
      /* Space between columns */
    }
  </style>
</head>

<body>

  <!-- Header and Navigation -->
   <?php include "header.php" ?>

  <!-- Main Content Areas -->
  <main>
    <div class="grid-container">

<!--<<<<<<< HEAD
      <form action="http://localhost:80/smu/smulib/MainP/contact.php" method="POST"><strong>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" placeholder ="Enter Your Name"style="width:500px; height:30px;" ><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" placeholder ="Enter Your Email" style="width:500px; height:30px;">
        <br>
        <label for="phonenumber">Phone Number:</label><br>
        <input type="text" id="phonenumber" name="phonenumber" maxlength ="12" placeholder ="Enter Your Phone Number" style="width:500px; height:30px;"><br>
======= -->
      <div>
        <section align="left">
          <h2>Contact Us</h2>
          <p>Have a question or comment? We would love to hear from you. Please fill out the form below and we will get back to you as soon as possible.</p>

          <form action="http://localhost:8080/smulib/MainP/contact.php" method="POST"><strong>
              <label for="name">Name:</label><br>
              <input type="text" id="name" name="name" placeholder="Enter Your Name" style="width:500px; height:30px;"><br>
              <label for="email">Email:</label><br>
              <input type="email" id="email" name="email" placeholder="Enter Your Email" style="width:500px; height:30px;">
              <br>
              <label for="phonenumber">Phone Number:</label><br>
              <input type="text" id="phonenumber" name="phonenumber" maxlength="12" placeholder="Enter Your Phone Number" style="width:500px; height:30px;"><br>

              <label for="message">Your Question or Comment:</label><br>
              <textarea id="message" name="message" style="width:500px; height:250px;" placeholder="Use this section for your questions or comments" required></textarea><br>
              <br>
              <input type="submit" value="Submit" style="width:50px; height:30px;">
              <input type="reset" value="Reset" style="width:50px; height:30px;">
            </strong>
          </form>
        </section>
      </div>
      <div>
        <section>
          <h2>Library Hours</h2>
          <table align="center">
            <tr>
              <th>Day</th>
              <th>Opening Time</th>
              <th>Closing Time</th>
            </tr>
            <tr>
              <td>Monday</td>
              <td align="center">9:00 AM</td>
              <td align="center">5:00 PM</td>
            </tr>
            <tr>
              <td>Tuesday</td>
              <td align="center">9:00 AM</td>
              <td align="center">5:00 PM</td>
            </tr>
            <tr>
              <td>Wednesday</td>
              <td align="center">9:00 AM</td>
              <td align="center">5:00 PM</td>
            </tr>
            <tr>
              <td>Thursday</td>
              <td align="center">9:00 AM</td>
              <td align="center">5:00 PM</td>
            </tr>
            <tr>
              <td>Friday</td>
              <td align="center">9:00 AM</td>
              <td align="center">5:00 PM</td>
            </tr>
            <tr>
              <td>Saturday</td>
              <td align="center">9:00 AM</td>
              <td align="center">1:00 PM</td>
            </tr>
            <tr>
              <td>Sunday</td>
              <td align="center">11:00 AM</td>
              <td align="center">2:00 PM</td>
            </tr>
            </tr>
            </tr>
            </tr>
            </tr>
            </tr>
            </tr>
            </tr>
            </tr>
          </table>
          <br>

          <p><strong>* SMU Library will be closed during public holidays</strong></p>
          <br>
          <p><strong>Stay Connected:</strong></p>
          <p>Follow us on social media to stay up-to-date on our latest news, promotions</p>
          <p>Facebook: <a href="https://www.facebook.com" target="blank">
              <img src="https://img.icons8.com/ios-filled/50/000000/facebook.png" alt="Facebook" width="24">
            </a></p>
          <p>Twitter: <a href="https://twitter.com">
              <img src="https://img.icons8.com/ios-filled/50/000000/twitter.png" alt="Twitter Icon" width="24">
            </a></p>
          <p>LinkedIn: <a href="https://www.linkedin.com" target="blank">
              <img src="https://img.icons8.com/ios-filled/50/000000/linkedin.png" alt="LinkedIn" width="24">
            </a></p>
          <p> Instagram: <a href="https://www.instagram.com" target="blank">
              <img src="https://img.icons8.com/ios-filled/50/000000/instagram-new.png" alt="Instagram" width="24">
            </a>
          </p>
        </section>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 SMU Library</p>
  </footer>

  <!-- Link to external JavaScript -->
  <script src="../JS/script.js"></script>
</body>

</html>