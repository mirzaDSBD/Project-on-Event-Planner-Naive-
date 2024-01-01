<?php
session_start();
include('connection.php');
if (isset($_GET['p_id'])) {
    $planner_id = $_GET['p_id'];
}
$username = $_SESSION['username'];
$sql = "SELECT full_name,phone,location FROM `user_info` WHERE username LIKE '$username' ";
$result = mysqli_query($conn, $sql);
$user_info = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Your Review</title>
    <style>
        body {
            background-color: #fffff0;
            height: 100%;
        }

        form {
            margin-bottom: 200px;
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bolder;
        }

        input[type="text"],
        input[type="tel"],
        input[type="date"],
        input[type="number"],
        textarea {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(to bottom, #f5f5f5 0%, #e6e6e6 100%);
            font-size: 16px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="tel"]:focus,
        input[type="date"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            outline: none;
            border-color: #0078d4;
        }

        button[type="submit"] {
            background-color: #0078d4;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-left: 250px;
            width: 150px;
        }

        button[type="submit"]:hover {
            background-color: #0063ad;
        }
    </style>
</head>

<body>
    <a href="requestForEvent.php?p_id=<?php echo $planner_id; ?>"></a>
    <form action="#" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $user_info['full_name']; ?>" required><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo $user_info['location']; ?>" required><br>

        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" required></textarea><br>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>

<?php
date_default_timezone_set('Asia/Dhaka');
$currentDateTime = date('Y-m-d h:i:s a'); // 12-hour format with "am" or "pm"
$currentTime = date('h:i a'); // current time in 12-hour format with "am" or "pm"
//echo $currentTime; // output: e.g. 10:30 pm

if (isset($_POST['submit'])) {
    $user = $username;
    $full_name = $_POST['name'];
    $location = $_POST['location'];
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $time = $currentTime;
    $sql = "INSERT INTO `review_list`(`username`, `full_name`, `location`, `planner_id`, `u_comment`, `review_time`) VALUES ('$user','$full_name','$location','$planner_id','$comment','$time')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Thanks for your valueable review!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        header('Location: error.php');
    }

    mysqli_close($conn);
}
?>