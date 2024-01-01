<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
// Retrieve the order_id and action values from the AJAX request
include('connection.php');

$order_id = $_GET['order_id'];
$action = $_GET['action'];

// Perform the necessary operations based on the value of the action variable
if ($action == 1) {
    $sql_b = "SELECT `order_id`, `planner_id`, `username`, `full_name`, `phone`, `location`, `start_date`, `end_date`, `budget`, `short_description` FROM `event_request` WHERE order_id  = $order_id";
    $result = mysqli_query($conn, $sql_b);
    $order = mysqli_fetch_assoc($result);

    $short_description = mysqli_real_escape_string($conn, $order['short_description']);

    $sql1_b = "INSERT INTO `accepted_event_request1`(`order_id`, `planner_id`, `username`, `full_name`, `phone`, `location`, `short_description`, `a_date`, `a_time`,`s_date`, `e_date`, `budget`)
    VALUES ('{$order['order_id']}', '{$order['planner_id']}', '{$order['username']}', '{$order['full_name']}', '{$order['phone']}', '{$order['location']}', '$short_description', CONVERT_TZ(NOW(), @@session.time_zone, '+06:00'), CONVERT_TZ(NOW(), @@session.time_zone, '+06:00'),
    '{$order['start_date']}', '{$order['end_date']}', '{$order['budget']}')";
    $result1 = mysqli_query($conn, $sql1_b);

    $sql_u = "SELECT u.email,u.full_name
    FROM event_request as e JOIN user_info as u
    ON(e.username = u.username)
    WHERE e.order_id = $order_id";

    $result_u = mysqli_query($conn, $sql_u);
    $user = mysqli_fetch_assoc($result_u);

    $sql_p = "SELECT p.planners_email,p.planners_name
    FROM `event_request` as e JOIN planner_list as p
    ON(e.planner_id = p.p_id)
    WHERE e.order_id = $order_id";

    $result_p = mysqli_query($conn, $sql_p);
    $planner = mysqli_fetch_assoc($result_p);
    $mail = new PHPMailer;

    // Set up SMTP authentication and encryption
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mirzaabbasuddin2@gmail.com';
    $mail->Password = 'qmgzlynfpehlbgns';
    $mail->SMTPSecure = '';
    $mail->Port = 587;

    $from = "info@eventplanner.com";
    $to = $user['email'];
    $subject = 'Event Request From Event Planner';
    $message = "Dear {$user['full_name']}, Your event request has been accepted by {$planner['planners_name']}.Thanks for staying with us.";

    $mail->setFrom($from, 'Event Planner');
    $mail->addAddress($to, $user['full_name']);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send the email
    if ($mail->send()) {
        echo 'Email sent successfully.';
    } else {
        echo 'Error: Unable to send email.';
    }
    $sql2 = "DELETE FROM `event_request` WHERE order_id = $order_id";
    $result2 = mysqli_query($conn, $sql2);
} else {
    $sql_u = "SELECT u.email,u.full_name
    FROM event_request as e JOIN user_info as u
    ON(e.username = u.username)
    WHERE e.order_id = $order_id";

    $result_u = mysqli_query($conn, $sql_u);
    $user = mysqli_fetch_assoc($result_u);

    $sql_p = "SELECT p.planners_email,p.planners_name
    FROM `event_request` as e JOIN planner_list as p
    ON(e.planner_id = p.p_id)
    WHERE e.order_id = $order_id";

    $result_p = mysqli_query($conn, $sql_p);
    $planner = mysqli_fetch_assoc($result_p);
    $mail = new PHPMailer;

    // Set up SMTP authentication and encryption
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mirzaabbasuddin2@gmail.com';
    $mail->Password = 'qmgzlynfpehlbgns';
    $mail->SMTPSecure = '';
    $mail->Port = 587;

    $from = "info@eventplanner.com";
    $to = $user['email'];
    $subject = 'Event Request From Event Planner';
    $message = "Dear {$user['full_name']}, We are sorry to infrom you that {$planner['planners_name']} is currently not available,kindly try to find out another one.Thanks for staying with us.";

    $mail->setFrom($from, 'Event Planner');
    $mail->addAddress($to, $user['full_name']);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send the email
    if ($mail->send()) {
        echo 'Email sent successfully.';
    } else {
        echo 'Error: Unable to send email.';
    }
    $sql3 = "DELETE FROM `event_request` WHERE order_id = $order_id";
    $result3 = mysqli_query($conn, $sql3);
}

// Return a response to the client
echo 'Order has been ' . ($action == 1 ? 'accepted' : 'rejected') . '.';
?><br />