<?php
  include("connection.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up Form</title>
    <style>
      body {
        font-family: Arial, sans-serif;
      }
      form {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      h1{
        color: #996F1D;
        margin-left: 2%;
        margin-top: 3%;
      }
      h3 {
        text-align: center;
        margin-right: 100px;
      }
      label {
        margin-bottom: 15px;
        margin-right: 90px;
      }
      input[type="text"],
      input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        box-sizing: border-box;
        border-radius: 5px;
        border: 1px solid #ccc;
      }
      input[type="submit"] {
        background-color: #308C4A;
        color: black;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
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
    <div style="display:flex;flex-direction:column;justify-content:center;align-items:center;height:70vh;">
    <h3>SIGN UP</h3>
      <form action="userSignUp.php" method="POST">
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
  </body>
  <?php
  if(isset($_POST['submit'])){
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
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

			// Close the database connection
			mysqli_close($conn);
       }
   ?>
</html>
