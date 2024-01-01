<?php
session_start();
include('connection.php');
$planner_id = $_GET['p_id'];
// $sql = "SELECT e.order_id,e.request_date, e.full_name, e.location, e.start_date, e.end_date, e.budget, e.short_description, u.pfofile_picture,u.phone
// FROM `event_request` AS e
// JOIN user_info AS u ON e.username = u.username
// WHERE e.planner_id = $planner_id
// ORDER BY e.request_date DESC";
$sql1 = "SELECT e.order_id, e.request_date, e.full_name, e.location, e.start_date, e.end_date, e.budget, e.short_description, u.pfofile_picture, u.phone
FROM `event_request` AS e
JOIN user_info AS u ON e.username = u.username
WHERE e.planner_id = $planner_id
ORDER BY e.request_date DESC";

$result1 = mysqli_query($conn, $sql1);
$eventRequests = [];

while ($row1 = mysqli_fetch_assoc($result1)) {
    $eventRequests[] = $row1;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Requests</title>
    <style>
        body{
            background-image: url('Images/request.png');
            background-repeat: no-repeat;
            height: 100%;
        }
        .event-request {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 10px auto;
            padding: 40px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            margin-right: 50px;
        }

        .event-request h2 {
            font-size: 18px;
            margin-top: 0;
        }

        .event-request p {
            margin: 10px 0;
        }

        .event-request button {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            font-size: 14px;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }

        .event-request button:hover {
            background-color: #0069d9;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
        }

        .accept-btn {
            background-color: green;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 8px;
        }

        .reject-btn {
            background-color: red;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .accept-btn:hover,
        .reject-btn:hover {
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <p style="color: #996F1D;font-size:30px;margin-bottom:0%">&#9733Event Planner</p>
    <div class="event-request">
        <?php foreach ($eventRequests as $eventRequest) : ?>
            <h2>An event request from <?php echo $eventRequest['full_name']; ?></h2>
            <p><?php echo $eventRequest['request_date']; ?></p>
            <!--<button onclick="showDetails(<?php echo array_search($eventRequest, $eventRequests); ?>)">View Details</button>-->
            <button onclick="showDetails(<?php echo htmlspecialchars(json_encode($eventRequest)); ?>)">View Details</button>
            <div id="details-<?php echo $eventRequest['order_id']; ?>" style="display:none">
                <img src="<?php echo $eventRequest['profile_picture']; ?>" alt="<?php echo $eventRequest['full_name']; ?>">
                <p><strong>Location:</strong> <?php echo $eventRequest['location']; ?></p>
                <p><strong>Phone:</strong> <?php echo $eventRequest['phone']; ?></p>
                <p><strong>Start Date:</strong> <?php echo $eventRequest['start_date']; ?></p>
                <p><strong>End Date:</strong> <?php echo $eventRequest['end_date']; ?></p>
                <p><strong>Budget:</strong> <?php echo $eventRequest['budget']; ?></p>
                <p><strong>Description:</strong> <?php echo $eventRequest['short_description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <script>
        function showDetails(eventRequest) {
            // Create a new modal or popup window
            const modal = document.createElement('div');
            modal.classList.add('modal');

            // Set the content of the modal
            modal.innerHTML = `
    <div class="modal-content">
        <img src="userUploads/${eventRequest.pfofile_picture}" alt="User Profile Picture" style="border-radius: 50%; height: 100px; width: 100px;">
        <p><strong>Name:</strong> ${eventRequest.full_name}</p>
        <p><strong>Location:</strong> ${eventRequest.location}</p>
        <p><strong>Phone:</strong> ${eventRequest.phone}</p>
        <p><strong>Event Start Date:</strong> ${eventRequest.start_date}</p>
        <p><strong>Event End Date:</strong> ${eventRequest.end_date}</p>
        <p><strong>Budget:</strong> ${eventRequest.budget}</p>
        <p><strong>Description:</strong> ${eventRequest.short_description}</p>
        <div class="modal-buttons">
                 <button class="accept-btn" data-order-id="${eventRequest.order_id}" data-action="1" onclick="get_order_id(${eventRequest.order_id}, 1)">Accept</button>
                <button class="reject-btn" data-order-id="${eventRequest.order_id}" data-action="0" onclick="get_order_id(${eventRequest.order_id}, 0)">Reject</button>
        </div>
    </div>
`;

            // Add the modal to the page
            document.body.appendChild(modal);

            // Add a click event listener to the modal to close it when clicked
            modal.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.remove();
                }
            });
        }

        function get_order_id(order_id, action) {
            console.log("Order ID: " + order_id);
            console.log("Action: " + action);

            // Send a GET request to insert_accepted_request.php with order_id and action parameters
            fetch(`insert_accepted_request1.php?order_id=${order_id}&action=${action}`)
                .then(response => response.text())
                .then(data => {
                    alert('Order has been ' + (action == 1 ? 'accepted' : 'rejected') + '.');
                })
                .catch(error => console.error(error));
        }
    </script>
</body>

</html>