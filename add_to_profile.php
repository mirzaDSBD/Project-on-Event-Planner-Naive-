<?php
include('connection.php');
// Retrieve the order_id from the POST request
$order_id = $_POST['order_id'];
$action = $_POST['data_action'];

$sql = "UPDATE `accepted_event_request1` SET `add_profile_preference`= $action WHERE order_id = $order_id";
$result = mysqli_query($conn,$sql);
// Return a response message (optional)
if($result){
    echo 'Order added to profile successfully';
}
?>
