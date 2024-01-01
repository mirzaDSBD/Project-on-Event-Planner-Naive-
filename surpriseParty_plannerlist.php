<?php
// establish a database connection using PDO
$dsn = "mysql:host=localhost;dbname=eventplanner";
$username = "eventplanner";
$password = "eventplanner123";
$conn = new PDO($dsn, $username, $password);

// prepare the SQL query
$query = "SELECT planners_name,planners_profile_picture,planners_designation,planners_experience,planners_email,review,p_id FROM planner_list
WHERE planners_designation LIKE 'Surprise Party Planner'";
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
    $person['experience'] = $result['planners_experience'];
    $person['email'] = $result['planners_email'];
    $person['review'] = $result['review'];
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
</head>
<style>
    body{
        background-color: #FBEECF;
    }
    table {
        margin-top: 10px;
        width: 100%;
        border-collapse: collapse;
        background: #FDF5Df;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        vertical-align: middle;
    }

    th {
        background-color: #BB1A34;
        color: #fff;
    }

    td {
        border-bottom: 1px solid #ddd;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ddd;
    }
    .photo {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 50%;
    }
    img {
        max-width: 100%;
        height: auto;
    }
</style>

<body>
    <h1 style="font-size: 60;color:black;text-align:center">Surprise Party Planner List,you can check necessary information before hiring</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Photo</th>
                <th>Designation</th>
                <th>Experience</th>
                <th>Email</th>
                <th>Rating</th>
                <th>Profile</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // assume that $people is a 2D array containing the information of birthday planners
            foreach ($people as $person) {
                echo "<tr>";
                echo "<td>" . $person['name'] . "</td>";
                //echo "<td><img src='uploads/" . $person['image'] . "'></td>";
                echo "<td><img src='uploads/" . $person['image'] . "' width='100px' height='100px'></td>";
                echo "<td>" . $person['designation'] . "</td>";
                echo "<td>" . $person['experience'] . "</td>";
                echo "<td>" . $person['email'] . "</td>";
                echo "<td>" . $person['review'] . "</td>";
                echo "<td><a href='p_profile.php?p_id=" . $person['p_id'] . "' style='text-decoration:none;'>View Profile</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>