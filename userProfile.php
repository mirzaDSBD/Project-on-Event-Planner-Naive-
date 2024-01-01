<?php
session_start();
include('connection.php');
$user_name = "@" . (string) $_SESSION['username'];
$user = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please login to access this page');</script>";
    echo "<script>window.location.href='userLogin.php';</script>";
    exit();
}
$result = mysqli_query($conn, "SELECT pfofile_picture,full_name, gender, occupation, phone, location, school, college, university,email FROM user_info WHERE username LIkE '$user' ");
$profile_pic = null;
$f_name = null;
$gen = null;
$occ = null;
$phn = null;
$loc = null;
$schn = null;
$clg = null;
$uni = null;
$email = null;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $profile_pic = $row['pfofile_picture'];
        $f_name = $row["full_name"];
        $gen = $row["gender"];
        $occ = $row["occupation"];
        $phn = $row["phone"];
        $loc = $row["location"];
        $sch = $row["school"];
        $clg = $row["college"];
        $uni = $row["university"];
        $email = $row["email"];
    }
} else {
    echo "No results found";
}

mysqli_close($conn); // close the connection
?>

<!DOCTYPE html>
<html>

<head>
    <title>Event Planner</title>
    <style>
        /* Style for the first row */
        .first-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80%;
            padding: 10px;
            background-color: white;
        }

        .update-profile {
            padding: 10px;
            background-color: #008CBA;
            color: white;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
        }

        .profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #ccc;
            /* replace with your profile picture */
        }

        .username {
            font-weight: bold;
            margin-left: 10px;
        }

        /* Style for the second row */
        .second-row {
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px;
            background-color: white;
        }

        .column {
            flex: 1;
            margin: 0 5 5px;
        }

        .preview {
            margin-bottom: 10px;
        }

        .preview-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        footer {
            margin-bottom: 20px;
        }
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <!-- First row -->
    <div class="first-row">
        <div class="logo">
            <a href="index.php" style="text-decoration: none;">
                <p style="color: #996F1D;font-size:30px">&#9733Event Planner</p>
            </a>
        </div>
        <div class="profile-info">
            <div class="profile-picture">
            <img src="<?php echo 'userUploads/' . $profile_pic; ?>" alt="<?php echo "profile is not set"; ?>" class="profile-pic">
            </div>
            <div class="username">
                <?php
                echo $user_name;
                ?>
            </div>
        </div>
        <a href="updateProfile.php" class="update-profile">Update Profile</a>
    </div>

    <!-- Second row -->
    <div class="second-row">
        <div class="column">
            <div class="preview">
                <div class="preview-title">Full Name:</div>
                <?php echo $f_name; ?>
            </div>
            <div class="preview">
                <div class="preview-title">Gender:</div>
                <?php echo $gen; ?>
            </div>
            <div class="preview">
                <div class="preview-title">Phone:</div>
                <?php echo $phn; ?>
            </div>
            <div class="preview">
                <div class="preview-title">Email:</div>
                <?php echo $email; ?>
            </div>
            <div class="preview">
                <div class="preview-title">Location:</div>
                <?php echo $loc; ?>
            </div>
            <div class="preview">
                <div class="preview-title">Occupation:</div>
                <?php echo $occ; ?>
            </div>
        </div>
        <div class="column" style="margin-bottom: 80px;">
            <div class="preview">
                <div class="preview-title">School:</div>
                <?php echo $sch; ?>
            </div>
            <div class="preview">
                <div class="preview-title">College:</div>
                <?php echo $clg; ?>
            </div>
            <div class="preview">
                <div class="preview-title">University:</div>
                <?php echo $uni; ?>
            </div>
        </div>
    </div><br><br><br><br><br>
    <footer>
        <?php
        include('footer.php');
        ?>
    </footer>
</body>

</html>