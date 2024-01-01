<?php
include('is_logged_in.php');
// establish a database connection using PDO
$dsn = "mysql:host=localhost;dbname=eventplanner";
$username = "eventplanner";
$password = "eventplanner123";
$conn = new PDO($dsn, $username, $password);

// prepare the SQL query
$query = "SELECT planners_profile_picture, planners_name, planners_designation,p_id FROM planner_list WHERE planners_designation LIKE 'Home Events Planner' AND level LIKE '3' LIMIT 5";
$stmt = $conn->prepare($query);

// execute the query
$stmt->execute();

// fetch the results as an array
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// create a 2D array to store the data
$people = array();

// iterate through the results and store the data in the 2D array
foreach ($results as $result) {
    $person = array();
    $person['image'] = $result['planners_profile_picture'];
    $person['name'] = $result['planners_name'];
    $person['designation'] = $result['planners_designation'];
    $person['p_id'] = $result['p_id'];
    $people[] = $person;
}
//echo $people[0]['image'],$people[0]['name'],$people[0]['designation'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner</title>
    <style>
        .header1 {
            height: 100px;
            width: 100%;
            background-color: white;
        }

        .header2 {
            height: 60px;
            width: 100%;
            background-color: white;
        }

        .main1 {
            height: 700px;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .row1-main1 {
            height: 500px;
            background-color: white;
        }

        .row1-display {
            height: 400px;
            width: 90%;
            margin-top: 40px;
            margin-left: 80px;
            border-radius: 20px;
            border-color: transparent;
            background-image: url("Images/Home/homeParty.png");
            background-position: center;
            background-size: cover;
            /* or contain, depending on your preference */
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .row1-display h1 {
            text-align: center;
            margin-top: 0;
        }

        .row1-display button {
            height: 30px;
            width: 100px;
            margin-top: 200px;
            /*20px*/
            background-color: #61c8d2;
            border-radius: 20px;
            border-color: transparent;
        }

        .row1-display button:hover {
            background-color: aquamarine;
        }

        .row2-main1 {
            height: 200px;
            background-color: transparent;
            margin-bottom: 100px;
        }

        .row2-display {
            height: 150px;
            width: 90%;
            margin-top: 10px;
            margin-left: 80px;
            background-color: #ECECEC;
            border-radius: 20px;
            border-color: transparent;
            margin-bottom: 0%;
        }

        .row2-display button {
            display: inline;
            width: 180px;
            height: 50px;
            background-color: #569982;
            font-size: 15px;
            color: black;
            margin-top: 45px;
            margin-left: 30px;
            border-radius: 10px;
            border-color: transparent;
        }

        .row2-display button:hover {
            background-color: #E9CCA7;
        }

        .main2 {
            width: 100%;
            height: 700px;
            background-color: whitesmoke;
            margin-bottom: 30px;
            display: grid;
            grid-template-rows: repeat(3, 1fr);
            /* three rows with equal height */
            grid-template-columns: repeat(3, 1fr);
            /* four columns with equal width */
            gap: 10px;
            /* gap between grid items */
        }

        .advertise {
            height: 250px;
            width: 550px;
            background-color: transparent;
            padding: 10px;
            margin-top: 30px;
            margin-left: 20px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .advertise-profile {
            height: 80%;
            width: 100px;
            background-color: transparent;
        }

        .advertise-profile img {
            width: 350px;
            height: 200px;
            justify-content: center;
        }

        .advertise-name {
            height: 10%;
            width: 350px;
            background-color: white;
        }

        .advertise-get-details {
            height: 10%;
            width: 350px;
            background-color: white;
        }

        .advertise-get-details button {
            background-color: white;
            border-radius: 10px;
            border-color: transparent;
            width: 100px;
            font-size: 15px;
            color: white;
        }

        .advertise-get-details button:hover {
            background-color: #E9CCA7;
        }

        .footer {
            height: 200px;
            width: 100%;
            background-color: transparent;
        }
    </style>
</head>

<body>
    <div class="header1"> <?php include('header.php'); ?> </div>
    <div class="header2"> <?php include('header2.php'); ?> </div>
    <div class="main1">
        <div class="row1-main1">
            <div class="row1-display">
                <!--<h1>Enjoy Your Birthday Like Never Before</h1>-->
                <button><a href="homeParty_plannerlist.php" style="text-decoration: none;">Learn More</a></button>
            </div>
        </div>
        <div class="row2-main1">
            <h1 style="margin-left:80px;">Most Populer In Home Party</h1>
            <div class="row2-display">
                <button style="margin-right: 5rem;"><a href="Additional/decoration1.php" style="text-decoration:none;color:black">&#127880 Decoration</a></button>
                <button style="margin-right: 5rem;"><a href="Additional/food.php" style="text-decoration:none;color:black">&#127828 Food & Catering</a></button>
                <button style="margin-right: 5rem;"><a href="Additional/photography.php" style="text-decoration:none;color:black">&#128249 Photography</a></button>
                <button style="margin-right: 5rem;"><a href="Additional/video.php" style="text-decoration:none;color:black">&#128253 Video Marketing</a></button>
                <button style="margin-right: 5rem;"><a href="Additional/partner.php" style="text-decoration:none;color:black">&#128108 Partnership</a></button>
            </div>
        </div>
    </div>
    <h1><strong style="margin-bottom: 0%;margin-left:30px">Explore More</strong></h1>
    <div class="main2">
        <div class="advertise">
            <div class="advertise-profile">
                <img src="<?php echo 'uploads/' . $people[0]['image']; ?>" alt="Image for person 2">
            </div>
            <div class="advertise-name">
                <?php
                echo $people[0]['name'] . ', ', $people[0]['designation'];
                ?>
            </div>
            <div class="advertise-get-details">
                <a href="p_profile.php?p_id=<?php echo $people[0]['p_id']; ?>" style="text-decoration: none;">Get Details</a>
            </div>
        </div>
        <div class="advertise">
            <div class="advertise-profile">
                <img src="<?php echo 'uploads/' . $people[1]['image']; ?>" alt="Image for person 2">
            </div>
            <div class="advertise-name">
                <?php
                echo $people[1]['name'] . ', ', $people[1]['designation'];
                ?>
            </div>
            <div class="advertise-get-details">
                <a href="p_profile.php?p_id=<?php echo $people[1]['p_id']; ?>" style="text-decoration: none;">Get Details</a>
            </div>
        </div>
        <div class="advertise">
            <div class="advertise-profile">
                <img src="<?php echo 'uploads/' . $people[2]['image']; ?>" alt="Image for person 2">
            </div>
            <div class="advertise-name">
                <?php
                echo $people[2]['name'] . ', ', $people[2]['designation'];
                ?>
            </div>
            <div class="advertise-get-details">
                <a href="p_profile.php?p_id=<?php echo $people[2]['p_id']; ?>" style="text-decoration: none;">Get Details</a>
            </div>
        </div>
        <div class="advertise">
            <div class="advertise-profile">
                <img src="<?php echo 'uploads/' . $people[3]['image']; ?>" alt="Image for person 2">
            </div>
            <div class="advertise-name">
                <?php
                echo $people[3]['name'] . ', ', $people[3]['designation'];
                ?>
            </div>
            <div class="advertise-get-details">
                <a href="p_profile.php?p_id=<?php echo $people[3]['p_id']; ?>" style="text-decoration: none;">Get Details</a>
            </div>
        </div>
        <div class="advertise">
            <div class="advertise-profile">
                <img src="<?php echo 'uploads/' . $people[4]['image']; ?>" alt="Image for person 2">
            </div>
            <div class="advertise-name">
                <?php
                echo $people[4]['name'] . ', ', $people[4]['designation'];
                ?>
            </div>
            <div class="advertise-get-details">
                <a href="p_profile.php?p_id=<?php echo $people[4]['p_id']; ?>" style="text-decoration: none;">Get Details</a>
            </div>
        </div>
    </div>
    <div class="footer">
        <?php
        include('footer.php')
        ?>
    </div>
</body>

</html>