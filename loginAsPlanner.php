<?php
session_start();
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
            background-image: url(Images/Login/pic1.jpg);
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
        <div class="row1-center">
        </div>
        <div class="row2-center">
            <h3 style="text-align: center;">PLANNER'S LOG IN</h3>
            <form action="#" method="POST">
                <label for="username"><b>Username:</b></label>
                <input type="text" id="username" name="username">
                <label for="password"><b>Password:</b></label>
                <input type="password" id="password" name="password">
                <input type="submit" name="submit" value="Login">
                <div class="login-link">
                    <span>Don't have an account?</span>
                    <a href="choosePlan.php">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $email = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to retrieve user info based on the provided email and password
    //$stmt = $conn->prepare("SELECT planners_email, planners_password FROM planner_list WHERE planners_email = ?");
    $stmt = $conn->prepare("SELECT planners_email, planners_password, planners_name FROM planner_list WHERE planners_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Login successful, set session variables
        $row = $result->fetch_assoc();
        $_SESSION['planners_email'] = $row['planners_email'];
        $_SESSION['planners_name'] = $row['planners_name'];
        // Redirect to a secured page
        header("Location: index.php");
        exit();
    } else {
        echo '<script>alert("Invalid email or password!!")</script>';
        exit();
    }
}

?>