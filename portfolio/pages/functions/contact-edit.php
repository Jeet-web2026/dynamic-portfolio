<?php

$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}



$id = $_POST['personSrNo'];
$name = $_POST['personNme'];
$email = $_POST['personEmail'];
$number = $_POST['contactNumber'];
$reason = $_POST['contactReason'];


$sql = "UPDATE `contact_details` SET `contact_name`= '$name',`contact_email`= '$email',`contact_number`= '$number',`contact_reason`= '$reason' WHERE `contact_details`.`contact_id`= $id";
$result = mysqli_query($connection, $sql);
header('location: ../admin-view/contact-view.php');
exit();
