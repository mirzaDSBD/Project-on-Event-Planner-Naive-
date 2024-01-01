<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
</head>
<style>
   footer {
  background-color: #664A15;
  color: #fff;
  padding: 30px;
}

.upper-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #555;
  padding-bottom: 10px;
}

.lower-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 10px;
}

.column {
  flex-basis: 33.33%;
  margin: 0 150px;
}

.logo-section {
  display: inline-flex;
}

.logo-section a {
  margin-right: 100px;
}

.button-section {
  text-align: right;
}

.button {
  background-color: #967638;
  color: #000000;
  padding: 10px 200px;
  border-radius: 10px;
  text-decoration: none;
  font-size: 30px;
  width: 150px;
}
.button :hover{
  color: #FFFFFF;
  font-size: 33px;
}
.lower-row img{
    width: 30px;
    height: 30px;
}
.lower-row img:hover{
  width: 40px;
  height: 40px;
}
</style>
<body>
<footer>
  <div class="upper-row">
    <div class="column">
        <p>&#9733Event Planner</p>
        <p>Dhaka,Bangladesh</p>
    </div>
    <div class="column">
      <p>Mob:+8801640720014</p>
      <p>Email:info@eventplanner.com</p>
    </div>
    <div class="column">
       <p>&copy;2023 by Aimers</p>
       <p>Powered by Aimers</p>
    </div>
  </div>
  <div class="lower-row">
    <h2>Follow Us</h2>
    <div class="logo-section">
      <a href="#"><img src="Images/Logo/linkedin-icon.png" alt="LinkedIn"></a>
      <a href="#"><img src="Images/Logo/facebook-icon.png" alt="Facebook"></a>
      <a href="#"><img src="Images/Logo/twitter-icon.png" alt="Twitter"></a>
      <a href="#"><img src="Images/Logo/instagram-icon.png" alt="Instagram"></a>
    </div>
    <div class="button-section">
      <a href="search.php" class="button"><strong>BOOK A CONSULTATION</strong></a>
    </div>
  </div>
</footer>
</body>
</html>