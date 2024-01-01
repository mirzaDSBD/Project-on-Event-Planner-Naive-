<?php
//session_start();
//include('connection.php');
//print_r($_GET['planner_email']);
//$planner_id = $_GET['planner_email'] ?? $_SESSION['planner_list']['planners_email'];
//print_r($planner_id);

//$planner_email = $_SESSION['planners_email'];
//$query = "SELECT planners_profile_picture, planners_email,planners_name, planners_bio, planners_designation, planners_phone, planners_experience FROM `planner_list` WHERE planners_email = '$planner_id'";
//$result = mysqli_query($conn, $query);
//$row = mysqli_fetch_assoc($result);
//mysqli_close($conn); // close the connection
?>
<?php
include('connection.php');

if (isset($_GET['planner_email']) && !empty($_GET['planner_email'])) {
    $planner_id = $_GET['planner_email'];
} else if (isset($_SESSION['planner_list']) && isset($_SESSION['planner_list']['planners_email'])) {
    $planner_id = $_SESSION['planner_list']['planners_email'];
} else {
    // set a default value if no valid planner ID is found
    $planner_id = 'null';
}
print_r($planner_id);
if ($planner_id) {
    $query = "SELECT planners_profile_picture, planners_email,planners_name, planners_bio, planners_designation, planners_phone, planners_experience FROM `planner_list` WHERE planners_email = '$planner_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn); // close the connection

    // display the planner's profile
    // ...
} else {
    // display an error message or redirect to a default page
    // ...
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Planner Dashboard</title>
    <a href="planner_dashboard.php?planner_email=$_SESSION[planner_email]">Go to Planner Dashboard</a>
    <style>
        /* Example CSS for layout purposes only */
        header,
        nav,
        main {
            display: block;
            width: 100%;
            max-width: 1700px;
            margin: 0 auto;
            box-sizing: border-box;
            padding: 10px;
        }

        nav ul {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            margin: 0;
            padding: 0;
            justify-content: space-between;
            align-items: center;
            margin-left: 70px;
            gap: 5px;
            margin-top: 2px;
            margin-bottom: 5px;
        }

        nav ul li {
            margin: 0 10px;
            margin-right: 120px;
            font-size: 20px;
        }

        nav ul li a {
            color: #000;
            text-decoration: none;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        .wrapper {
            display: flex;
            flex-wrap: wrap;
        }

        .col {
            flex: 1;
            display: inline-block;
            vertical-align: top;
            box-sizing: border-box;
            padding: 10px;
            width: 33.33%;
            border-right: 1px solid #ccc;
        }

        .col img {
            display: block;
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            margin-left: 40px;
        }

        .col h2 {
            margin-top: 0;
        }

        .col p {
            margin-bottom: 10px;
            font-size: 20px;
        }

        .col:last-child {
            border-right: none;
        }

        .profile-pic {
            width: 250px;
            height: 250px;
            border-radius: 50%;
        }

        .request-button {
            display: none;
            background-color: green;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: opacity 0.2s ease-in-out;
        }

        .request-button:hover {
            background-color: darkgreen;
        }
    </style>
</head>

<body>
    <p style="color: #996F1D;font-size:30px;margin-bottom:0%">&#9733Event Planner</p>
    <main>
        <div class="wrapper">
            <div class="col" onmouseover="showButton(this)" onmouseout="hideButton(this)">
                <h2 style="text-align: center;">Profile</h2>
                <img src="<?php //echo 'uploads/' . $row['planners_profile_picture']; ?>" alt="<?php //echo $row['planners_name']; ?>" class="profile-pic">
                <h2><?php //echo $row['planners_name']; ?></h2>
                <p>Bio:<?php //echo $row['planners_bio']; ?></p>
                <p>Designation:<?php //echo $row['planners_designation']; ?></p>
                <p>Phone:<?php //echo $row['planners_phone']; ?></p>
                <p>Email:<?php //echo $row['planners_email']; ?></p>
                <p>Experience:<?php //echo $row['planners_experience']; ?></p>
                <button class="request-button"><a href="" style="text-decoration: none;color:white">Request For Event</a></button>
            </div>
            <div class="col">
                <h2 style="text-align: center;">Events</h2>
                <p style="text-align: center;">Previous events done by me</p>
                <!-- List of past events goes here -->
            </div>
            <div class="col">
                <h2 style="text-align: center;">Reviews</h2>
                <!-- List of reviews goes here -->
            </div>
        </div>
    </main>
</body>
<script>
    function showButton(element) {
        var button = element.querySelector('.request-button');
        button.style.display = 'block';
    }

    function hideButton(element) {
        var button = element.querySelector('.request-button');
        button.style.display = 'none';
    }
</script>

</html>