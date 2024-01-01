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
    <title>Request For Event</title>
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

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo $user_info['phone']; ?>" required><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo $user_info['location']; ?>" required><br>

        <label for="start-date">Start Date:</label>
        <input type="date" id="start-date" name="start-date" required><br>

        <label for="end-date">End Date:</label>
        <input type="date" id="end-date" name="end-date" required><br>

        <label for="budget">Budget:</label>
        <input type="number" id="budget" name="budget" required><br>

        <label for="short-description">Short Description:</label>
        <textarea id="short-description" name="short-description" required></textarea><br>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>

<?php
date_default_timezone_set('Asia/Dhaka');
$currentDateTime = date('Y-m-d H:i:s');

if (isset($_POST['submit'])) {
    $user = $username;
    $full_name = $_POST['name'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $start_date = $_POST['start-date'];
    $end_date = $_POST['end-date'];
    $budget = $_POST['budget'];
    $short_description = mysqli_real_escape_string($conn, $_POST['short-description']);
    $date = $currentDateTime;
    $sql1 = "INSERT INTO `event_request`(`planner_id`, `username`, `full_name`, `phone`, `location`, `start_date`, `end_date`, `budget`, `short_description`, `request_date`) VALUES ('$planner_id','$user','$full_name','$phone','$location','$start_date','$end_date','$budget','$short_description','$date')";
    $result = mysqli_query($conn, $sql1);

    if ($result) {
        echo "<script>alert('Event request submitted successfully');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        header('Location: error.php');
    }

    mysqli_close($conn);
}
?>