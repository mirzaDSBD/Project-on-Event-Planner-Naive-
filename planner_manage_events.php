<?php
session_start();
include('connection.php');
$planner_id = $_GET['p_id'];
$sql = "SELECT a.order_id, a.planner_id, a.username, a.full_name, a.phone, a.location, a.budget, a.short_description, a.s_date, a.e_date, a.a_date, a.a_time, a.a_serial, a.add_profile_preference, u.pfofile_picture
FROM accepted_event_request1 AS a
JOIN user_info AS u ON (a.username = u.username)
WHERE a.planner_id = $planner_id
ORDER BY a.a_serial DESC, a.a_time DESC;";
?>

<html>

<head>
	<title>Accepted Event Request</title>
	<style>
		body {
			background-color: #206777;
		}

		.grid-container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			padding: 10px;
		}

		.grid-item {
			background-color: white;
			border: 2px solid gray;
			border-radius: 10px;
			padding: 20px;
			font-size: 20px;
			text-align: center;
			height: 300px;
			width: 700px;
			margin: 10px;
		}
		.grid-item:hover{
			background-color: gray;
		}
		.grid-item img {
			height: 100px;
			width: 100px;
			border-radius: 50%;
			object-fit: cover;
			margin-bottom: 10px;
		}
	</style>
</head>

<body>
	<h1 style="text-align: center;">Accepted Event Request</h1>
	<?php
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$event_start_date = date("F j, Y, g:i a", strtotime($row['s_date']));
			$event_end_date = date("F j, Y, g:i a", strtotime($row['e_date']));
	?>
			<div class="grid-container">
				<div class="grid-item">
					<img src="userUploads/<?php echo $row['pfofile_picture']; ?>">
					<br>
					From: <?php echo $row['full_name'] ?><br>
					Contact: <?php echo $row['phone'] ?><br>
					Location: <?php echo $row['location'] ?><br>
					Budget: <?php echo $row['budget'] ?><br>
					Event Start Date: <?php echo $event_start_date ?><br>
					Event End Date: <?php echo $event_end_date ?><br>
					<?php if ($row['add_profile_preference'] != 1) { ?>
					<button class="add-to-profile-button" onclick="addToProfile(<?php echo $row['order_id']; ?>,1)">Add It To Your Profile</button>
					<?php } ?>
					<?php if ($row['add_profile_preference'] != 0) { ?>
					<button class="add-to-profile-button" onclick="addToProfile(<?php echo $row['order_id']; ?>,0)">Remove From Your Profile</button>
					<?php } ?>
				</div>
			</div>
	<?php
		}
	} else {
		echo "No results found.";
	}
	mysqli_close($conn);
	?>
	<style>
		.grid-item {
			position: relative;
		}

		.add-to-profile-button {
			display: none;
			position: absolute;
			top: 90%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 10px 20px;
			font-size: 16px;
			border: none;
			background-color: #4CAF50;
			color: white;
			cursor: pointer;
		}

		.add-to-profile-button:hover {
			background-color: green;
		}

		.grid-item:hover .add-to-profile-button {
			display: block;
		}
	</style>
	<script>
		function addToProfile(order_id,data_action) {
			if(data_action==1){
				alert("Event added to profile successfully")
			}
			else{
				alert("Event removed from profile successfully")
			}
			console.log("Add to profile button clicked for order_id: " + order_id);
			console.log(data_action);

			// Send the order_id to the server using AJAX
			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'add_to_profile.php');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				if (xhr.status === 200 && xhr.responseText !== '') {
					console.log('Response: ' + xhr.responseText);
				}
			};
			xhr.send('order_id=' + encodeURIComponent(order_id) + '&data_action=' + encodeURIComponent(data_action));
		}
	</script>

</body>
</html>