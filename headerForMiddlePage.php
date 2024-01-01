<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-PC1usyi/S+JkKj+sNgz1aeNBPx+o02GX6Svaj8RudcVgOiv69h2B4z+w3lOD4bbbnjgk6i9XnjDvM8s20WV7GA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Header</title>
</head>
<style>
  header {
    height: 15vh;
    background-color: #FFF8F8;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 2rem;
    background: linear-gradient(to bottom, #ffffff, #f5f5f5);
  }
  header div {
    font-size: 2rem;
  }
  nav ul {
    list-style: none;
    display: flex;
  }

  nav li {
    margin-right: 5rem;
    color: #000000;
  }
  nav li a:hover{
    color:#F41A1A
  }

  nav a {
    color: #000000;
    text-decoration: none;
    font-size: 25px;
  }

  .dropdown {
    display: none;
    position: absolute;
    top: 90px;
    left: 90%;
    z-index: 1;
  }

  .dropdown button {
    display: block;
    width: 100%;
    text-align: center;
    background-color: #fff;
    border: none;
    border-bottom: 1px solid #ccc;
    padding: 10px;
    cursor: pointer;
  }

  .dropdown button:hover {
    background-color: #1776B8;
  }

  .dropdown button:last-child {
    border-bottom: none;
  }
</style>

<body>
  <header>
    <div>
    <a href="index.php" style="text-decoration: none;"><p style="color: #996F1D;font-size:30px;margin-top:25px">&#9733Event Planner</p></a>
    </div>
    <div class="searchBar">
        <?php
            include('searchBar.php');
        ?>
    </div>
    <nav>
      <ul style="list-style: none; display: flex;">
        <li style="margin-right: 4rem;"><a href="#">Home</a></li>
        <li style="margin-right: 4rem;"><a href="aboutUs.php">About</a></li>
        <li style="margin-right: 4rem;"><a href="#">Virtual Assistant</a></li>
        <li style="margin-right: 4rem;"><a href="#" id="services-btn">Services</a></li>
        <div id="services-dropdown" class="dropdown">
          <button><a href="#">Birthay</a></button>
          <button><a href="#">Wedding</a></button>
          <button><a href="#">Corporate</a></button>
          <button><a href="#">Home Party</a></button>
          <button><a href="#">Surprise Party</a></button>
          <button><a href="#">Customized Plans</a></button>
        </div>
        <li style="margin-right: 4rem;"><a href="contactUs.php">Contact</a></li>
        <li><a href="#" id="more-btn">More</a></li>
        <div id="more-dropdown" class="dropdown">
          <button><a href="userSignUp.php">Sign Up</a></button>
          <button><a href="userLogin.php">Log In</a></button>
          <button><a href="search.php">Search</a></button>
          <button><a href="#">Message</a></button>
          <button><a href="userProfile.php">Profile</a></button>
          <button><a href="#">Notiication</a></button>
          <button><a href="#">Wishlist</a></button>
          <button><a href="faq.php">FAQ</a></button>
          <button><a href="userLogin.php" id = "logout">Log Out</a></button>
        </div>
      </ul>
    </nav>
  </header>
</body>
<script>
 // Get the Services and More buttons and dropdown menus
var servicesBtn = document.getElementById("services-btn");
var servicesDropdown = document.getElementById("services-dropdown");
var moreBtn = document.getElementById("more-btn");
var moreDropdown = document.getElementById("more-dropdown");

// Add a click event listener to the Services button
servicesBtn.addEventListener("click", function() {
  // Toggle the visibility of the Services dropdown menu
  if (servicesDropdown.style.display === "block") {
    servicesDropdown.style.display = "none";
  } else {
    servicesDropdown.style.display = "block";
  }
});

// Add a click event listener to the more button
 moreBtn.addEventListener("click", function() {
  // Toggle the visibility of the more dropdown menu
  if (moreDropdown.style.display === "block") {
    moreDropdown.style.display = "none";
  } else {
    moreDropdown.style.display = "block";
  }
});

// Close the dropdown menus when the user clicks outside of them
document.addEventListener("click", function(event) {
  if (!event.target.matches("#services-btn") && !event.target.matches("#services-dropdown button")) {
    servicesDropdown.style.display = "none";
  }
  if (!event.target.matches("#more-btn") && !event.target.matches("#more-dropdown button")) {
    productsDropdown.style.display = "none";
  }
});
</script>
</html>