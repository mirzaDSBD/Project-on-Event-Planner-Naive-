<?php
$host = 'localhost';
$dbname = "eventplanner";
$db_username = "eventplanner";
$password = "eventplanner123";
?>
<?php
// Start the session
session_start();

// Include the database connection
include("connection.php");

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit();
}

// Set the username to match
$username = $_SESSION['username'];
$sql = "SELECT * FROM `user_info` WHERE username LIKE '$username'";
$result = mysqli_query($conn, $sql);
$user_info = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Event Planner</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}

		.container {
			margin: 50px auto;
			max-width: 600px;
			background-color: #fff;
			padding: 20px;
			box-shadow: 0px 0px 10px #888;
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		h1 {
			font-size: 32px;
			margin-bottom: 20px;
		}

		label {
			display: block;
			font-weight: bold;
			margin-bottom: 10px;
		}

		input[type="text"],
		select {
			display: block;
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-bottom: 20px;
			font-size: 16px;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #007bff;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
			margin-top: 20px;
			margin-bottom: 10px;
		}

		.profile-picture {
			width: 200px;
			height: 200px;
			border-radius: 50%;
			background-color: #ccc;
			margin-bottom: 20px;
			background-position: center;
			background-size: cover;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
		}

		.upload-container {
			text-align: center;
			margin-left: 50px;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>Your Profile</h1>
		<form enctype="multipart/form-data" action="#" method="POST" onsubmit="return validateForm()">
			<div class="profile-picture">
				<?php if (!empty($user_info['profile_picture'])) : ?>
					<img id="preview" src="path/to/uploads/<?php echo $user_info['profile_picture']; ?>" alt="Profile Picture">
				<?php else : ?>
					<img id="preview" src="default-profile-pic.jpg" alt="Profile Picture">
				<?php endif; ?>
				<div class="upload-container">
					<input id="file-upload" type="file" name="profile-picture" onchange="previewImage()">
				</div>
			</div>
			<label for="first-name">Full Name:</label>
			<input type="text" id="input" name="full_name" placeholder="Enter your full name" value="<?php echo $user_info['full_name']; ?>">

			<label for="gender">Gender:</label>
			<select id="gender" name="gender">
				<option value="">Select your gender</option>
				<option value="male" <?php if ($user_info['gender'] === 'male') {
											echo ' selected';
										} ?>>Male</option>
				<option value="female" <?php if ($user_info['gender'] === 'female') {
											echo ' selected';
										} ?>>Female</option>
				<option value="other" <?php if ($user_info['gender'] === 'other') {
											echo ' selected';
										} ?>>Other</option>
			</select>

			<label for="occupation">Occupation:</label>
			<select id="occupation" name="occupation">
				<option value="">Select your occupation</option>
				<option value="student" <?php if ($user_info['occupation'] === 'student') {
											echo ' selected';
										} ?>>Student</option>
				<option value="officer" <?php if ($user_info['occupation'] === 'officer') {
											echo ' selected';
										} ?>>Officer</option>
				<option value="other" <?php if ($user_info['occupation'] === 'other') {
											echo ' selected';
										} ?>>Other</option>
			</select>

			<label for="phone">Phone:</label>
			<input type="text" id="phone" name="phone" placeholder="Enter your phone number" value="<?php echo $user_info['phone']; ?>">

			<label for="email">Email:</label>
			<input type="text" id="email" name="email" placeholder="Enter your email address" value="<?php echo $user_info['email']; ?>">

			<label for="location">Location:</label>
			<input type="text" id="location" name="location" placeholder="Enter your location" value="<?php echo $user_info['location']; ?>">

			<label for="school">School:</label>
			<input type="text" id="school" name="school" placeholder="Enter your school name" value="<?php echo $user_info['school']; ?>">
			<label for="college">College:</label>
			<input type="text" id="college" name="college" placeholder="Enter your college name" value="<?php echo $user_info['college']; ?>">
			<label for="university">University:</label>
			<input type="text" id="university" name="university" placeholder="Enter your university name" value="<?php echo $user_info['university']; ?>">

			<input type="submit" name="submit" value="Save Changes">
		</form>
	</div>
</body>
<script>
	function previewImage() {
		var preview = document.querySelector('#preview');
		var file = document.querySelector('#file-upload').files[0];
		var reader = new FileReader();

		reader.addEventListener("load", function() {
			preview.src = reader.result;
			preview.style.width = '200px';
			preview.style.height = '200px';
			preview.style.borderRadius = '50%';
		}, false);

		if (file) {
			reader.readAsDataURL(file);
		}
	}

	function validateForm() {
		var changed = false; // set initial value of changed variable to false

		// check each input field to see if its value has been changed
		var inputs = document.getElementsByTagName("input");
		for (var i = 0; i < inputs.length; i++) {
			if (inputs[i].type !== "submit" && inputs[i].value !== inputs[i].defaultValue) {
				changed = true;
				break;
			}
		}

		// check each select field to see if its value has been changed
		var selects = document.getElementsByTagName("gender");
		for (var i = 0; i < selects.length; i++) {
			if (selects[i].value !== selects[i].defaultValue) {
				changed = true;
				break;
			}
		}

		// if no input fields have been changed, display an error message and prevent the form from submitting
		if (!changed) {
			alert("Please change at least one input field before submitting.");
			return false;
		}
	}
</script>

</html>
<?php

try {
	$dbh = new PDO("mysql:host=$host;dbname=$dbname", $db_username, $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
	exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Get the form data
	$profilePicture = isset($_FILES['profile-picture']['name']) ? $_FILES['profile-picture']['name'] : null;
	$full_name = $_POST['full_name'];
	$gender = $_POST['gender'];
	$occupation = $_POST['occupation'];
	$phone = $_POST['phone'];
	$location = $_POST['location'];
	$school = $_POST['school'];
	$college = $_POST['college'];
	$university = $_POST['university'];
	$username = $_SESSION['username'];

	// check if the uploaded file is an actual image file
	$allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);
	$detectedType = exif_imagetype($_FILES['profile-picture']['tmp_name']);
	$error = !in_array($detectedType, $allowedTypes);

	if (!$error) {
		// move the uploaded file to the appropriate directory
		$uploadsDirectory = __DIR__ . '/userUploads/';
		$destinationPath = $uploadsDirectory . $profilePicture;

		if (!move_uploaded_file($_FILES['profile-picture']['tmp_name'], $destinationPath)) {
			echo "Error moving file";
			exit;
		}

		try {
			$sql = "UPDATE user_info SET
			       pfofile_picture = '$profilePicture',
			       full_name='$full_name',
			       gender='$gender',
			       occupation='$occupation',
			        phone='$phone',
			       location='$location',
			     school='$school',
			     college='$college',
			      university='$university'
			    WHERE username LIKE '$username'";

			//$result = mysqli_query($conn, $sql);
			$result = $dbh->query($sql);

			// Check if the query was successful
			if ($result) {
				echo "<script>alert('Profile updated successfully');</script>";
				//header("Location: userProfile.php");
			} else {
				echo "Error updating profile: " . mysqli_error($conn);
			}
		} catch (PDOException $e) {
			if ($e->errorInfo[1] === 1048 && $e->errorInfo[0] === '23000') {
				echo "<script>alert('Data inserted successfully');</script>";
			} else {
				echo "<script>alert('Error in the form');</script>";
			}
		}
	} else {
		echo "Invalid file type";
	}
}
?>