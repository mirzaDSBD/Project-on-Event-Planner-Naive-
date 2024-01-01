<?php
session_start();
include('connection.php');

// Get planner info based on id
$planner_id =  $_SESSION['planners_email'];
$sql = "SELECT planners_name,planners_bio,planners_phone,planners_experience FROM `planner_list` Where planners_email LIKE '$planner_id' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!-- HTML form for updating planner profile -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Style the form container */
        .form-container {
            background-color: #b7d9b1;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 250px;
            width: 500px;
        }
        .form-group{
            width: 400px;
            margin-left: 50px;
        }
        /* Style the form input fields */
        .form-control {
            display: block;
            width: 100%;
            padding: 10px;
            border: 1px solid white;
            border-radius: 4px;
            font-size: 16px;
            line-height: 1;
            margin-bottom: 20px;
        }

        input {
            background-color: white;
            width: 80px;
            height: 20px;
        }

        textarea {
            font-family: Arial, sans-serif;
            background-color: white;
            height: 20px;
        }

        /* Style the form label */
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        /* Style the submit button */
        .btn-primary {
            background-color: #007bff;
            border-radius: 5px;
            font-weight: bold;
            font-size: 15px;
            margin-left: 45%;
        }

        .btn-primary:hover {
            background-color: #2ecc71;
            border-color: #0062cc;
        }
        .btn-primary:focus,
        .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }
    </style>
</head>

<body>
    <p style="color: #996F1D;font-size:30px;margin-bottom:0%">&#9733Event Planner</p>
    <h1 style="text-align: center;">Welcome, <?php echo $_SESSION['planners_name']; ?></h1>
    <p style="text-align: center;font-size:20px">You can update your information here</p>
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <form method="post" action="" class="form-container">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name"  value="<?php echo $row['planners_name']; ?>">
            </div>
            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea class="form-control" id="bio" name="bio" rows="3"><?php echo $row['planners_bio']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $row['planners_phone']; ?>">
            </div>
            <div class="form-group">
                <label for="experience">Experience</label>
                <textarea class="form-control" id="experience" name="experience" rows="3"><?php echo $row['planners_experience']; ?></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary" style="background-color: #2ecc71; border-color: #2ecc71;">Update</button>
        </form>
    </div>

</body>

</html>
<?php
// Handle form submission
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $bio = $_POST['bio'];
    $phone = $_POST['phone'];
    $experience = $_POST['experience'];

    // Update planner info in database
    $update_query = "UPDATE planner_list SET planners_name = '$name', planners_bio = '$bio', planners_phone = '$phone', planners_experience = '$experience' WHERE planners_email = '$planner_id'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        // Redirect to planner profile page if update successful
        echo "<script>alert('Planner profile updated successfully');</script>";
        echo "<script>window.location.href='plannerProfile.php';</script>";
        exit();
    } else {
        echo "Error updating planner profile: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>