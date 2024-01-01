<?php
session_start();
include('connection.php');
if (!isset($_SESSION['planners_email']) || empty($_SESSION['planners_email'])) {
    echo "<script>alert('Please login to access this page');</script>";
    echo "<script>window.location.href='loginAsPlanner.php';</script>";
    exit();
}
$username = $_SESSION['planners_email'];
$query = "SELECT planners_profile_picture, planners_email,planners_name, planners_bio, planners_designation, planners_phone, planners_experience,p_id FROM `planner_list` WHERE planners_email = '$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$planner_id = $row['p_id'];
?>
<?php
$sql1 = "SELECT full_name,request_date FROM `event_request` WHERE planner_id = $planner_id ORDER BY request_date DESC;";
$result1 = mysqli_query($conn, $sql1);
$eventRequests = [];

while ($row1 = mysqli_fetch_assoc($result1)) {
    $eventRequests[] = $row1;
}
?>

<?php
$sql3 = "SELECT a.full_name,a.location,a.short_description,u.pfofile_picture
FROM `accepted_event_request1` as a JOIN user_info as u
ON(a.username = u.username)
WHERE a.planner_id = $planner_id AND
a.add_profile_preference = 1";
?>

<?php
$sql2 = "SELECT full_name, location, u_comment, review_time FROM `review_list` WHERE planner_id = $planner_id ORDER BY review_time DESC";
$result2 = mysqli_query($conn, $sql2);
$reviews = [];
$index = 0;

while ($row2 = mysqli_fetch_assoc($result2)) {
    $reviews[] = $row2;
    $index++;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Planner Dashboard</title>
    <script src="https://kit.fontawesome.com/89574d0924.js" crossorigin="anonymous"></script>
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

        .update-button {
            /*display: none;*/
            background-color: green;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: opacity 0.2s ease-in-out;
        }

        .update-button:hover {
            background-color: darkgreen;
        }

        .grid-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }

        .grid-item {
            background-color: pink;
            border-radius: 10px;
            padding: 20px;
            font-size: 20px;
            text-align: center;
            height: 250px;
            width: 500px;
            margin: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .grid-item img {
            height: 100px;
            width: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .event-info {
            margin-left: 20px;
        }

        .event-info h3 {
            font-weight: bold;
            font-size: 20px;
            line-height: 0.02;
        }

        .event-info h5 {
            color: gray;
            font-size: 15px;
            line-height: 0.2;
        }

        .event-info .description {
            font-weight: bold;
        }
        .review{
            margin-top:50px;
            height: 150px;
        }
    </style>
</head>

<body>
    <p style="color: #996F1D;font-size:30px;margin-bottom:0%">&#9733Event Planner</p>
    <header>
        <h1 style="text-align: center;">Welcome, <?php echo $_SESSION['planners_name']; ?></h1>
        <nav>
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="planner_update_form.php">Update Profile</a></li>
                <li><a href="event_request.php?p_id=<?php echo $planner_id; ?>" id="event_request">Event Request</a></li>
                <li><a href="planner_manage_events.php?p_id=<?php echo $planner_id; ?>">Manage Events</a></li>
                <li><a href="#" id="notification">Notification</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="wrapper">
            <div class="col" onmouseover="showButton(this)" onmouseout="hideButton(this)">
                <h2 style="text-align: center;">Profile</h2>
                <img src="<?php echo 'uploads/' . $row['planners_profile_picture']; ?>" alt="<?php echo $row['planners_name']; ?>" class="profile-pic">
                <h2><?php echo $row['planners_name']; ?></h2>
                <p>Bio:<?php echo $row['planners_bio']; ?></p>
                <p>Designation:<?php echo $row['planners_designation']; ?></p>
                <p>Phone:<?php echo $row['planners_phone']; ?></p>
                <p>Email:<?php echo $row['planners_email']; ?></p>
                <p>Experience:<?php echo $row['planners_experience']; ?></p>
                <!--<button class="update-button"><a href="planner_update_form.php" style="text-decoration: none;color:white">Update Info</a></button>-->
            </div>
            <div class="col">
                <h2 style="text-align: center;">Events</h2>
                <!-- List of past events goes here -->
                <?php
                $result = mysqli_query($conn, $sql3);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="grid-container">
                            <div class="grid-item">
                                <img src="userUploads/<?php echo $row['pfofile_picture']; ?>">
                                <br>
                                <div class="event-info">
                                    <h3><?php echo $row['full_name'] ?></h3>
                                    <h5><?php echo $row['location'] ?></h5>
                                    <p class="description"><?php echo '"<b>' . $row['short_description'] . '</b>"' ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "No events added yet.";
                }
                //mysqli_close($conn);
                ?>
            </div>
            <div class="col">
                <h2 style="text-align: center;">Reviews</h2>

                <?php
                // If there are no reviews, display a message
                if (count($reviews) == 0) {
                    echo "<p>There are no reviews for this planner yet.</p>";
                } else {
                    $reviews = array_values($reviews); // get indexed array

                    $count = count($reviews);
                    for ($index = 0; $index < $count; $index++) {
                        $review = $reviews[$index];
                        $color = $index % 2 == 0 ? "#FFFFE0" : "#FFE5B4";
                        echo "<div class='review' style='background-color: {$color};'>";
                        echo "<h3 style='display: inline;'>{$review['full_name']}</h3>";
                        echo "<h5 style='display: inline; margin-left: 10px;'>from {$review['location']}</h5><br>";
                        echo "<h4>\"{$review['u_comment']}\"</h4>";
                        echo "<h6 style='display: inline;'>[{$review['review_time']}]</h6>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </main>
    <script>
        const notificationLink = document.querySelector('#notification');

        notificationLink.addEventListener('click', () => {
            // Set the color based on the notification count
            const colors = ['red', 'orange', 'blue', 'green', 'purple'];

            // Get all event requests for the current planner
            const eventRequests = <?php echo json_encode($eventRequests); ?>;

            // Open a new window
            const notificationWindow = window.open('', 'Notification', 'width=350,height=250');
            notificationWindow.document.title = "Notification";

            // Set the content of the new window to the notification message
            notificationWindow.document.body.innerHTML = `
            <div style="background-color: #f2f2f2; padding: 15px;">
            ${eventRequests.map((eventRequest, index) => `
                <h1 style="color: ${colors[index % colors.length]}; font-size: 15px; margin-top: 0;">
                    You got an event request from ${eventRequest.full_name}.
                </h1>
                <p style="color: #666; font-size: 13px;">${eventRequest.request_date}</p>
            `).join('')}
            </div>
        `;
        });
    </script>
</body>

</html>