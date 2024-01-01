<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Planner</title>
  <style>
    body {
      background-color: #ECECEC;
      font-family: Arial, sans-serif;
    }

    .center {
      width: 1200px;
      height: 400px;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: flex;
      flex-direction: row;
      border-radius: 20px;
    }

    .row1-center {
      background-color: #967638;
      width: 60%;
      border-radius: 15px;
      background-image: url(Images/Login/pic2.jpg);
    }

    .row1-center img {
      height: 300px;
      width: 500px;
    }

    .row2-center {
      background-color: white;
      width: 40%;
      border-radius: 15px;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    h1 {
      color: #996F1D;
      margin-left: 2%;
      margin-top: 3%;
    }

    h3 {
      text-align: center;
      margin-right: 110px;
    }

    label {
      margin-bottom: 30px;
      margin-right: 300px;
      margin-top: 0%;
    }

    input[type="text"],
    input[type="password"] {
      width: 80%;
      padding: 10px;
      margin-bottom: 20px;
      margin-top: 0%;
      box-sizing: border-box;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    input[type="submit"] {
      background-color: #308C4A;
      color: black;
      padding: 10px 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 80%;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .login-link {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      margin-top: 10px;
      font-size: 12px;
    }

    .login-link a {
      color: blue;
      margin-left: 5px;
    }
  </style>
</head>

<body>
  <h1> ★ Event Planner</h1>
  <h1 style="text-align: center;color:black">Welcome to the Event Planner!</h1>
  <div class="center">
    <div class="row1-center"></div>
    <div class="row2-center">
      <h3 style="text-align: center;">SIGN UP</h3>
      <form action="#" method="POST">
        <label for="username"><b>Username:</b></label>
        <input type="text" id="username" name="username">
        <label for="password"><b>Password:</b></label>
        <input type="password" id="password" name="password">
        <input type="submit" name="submit" value="Sign Up For Free">
        <div class="login-link">
          <span>Already have an account?</span>
          <a href="userLogin.php">Log In</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
  // Get the user inputs
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "INSERT INTO `user_info`(`username`, `password`) VALUES ('$username','$password')";
  if (mysqli_query($conn, $sql)) {
    //echo "Sign up successful!";
    echo '<script>alert("Sign up successful!")</script>';
    header('userLogin.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
