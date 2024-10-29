<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if(!$connection){
    die ('Connection error: ' . mysqli_connect_error());
}
$id = $_GET['slno'];
$sql = "DELETE FROM `contact_details` WHERE `contact_id` = $id";

$result = mysqli_query($connection, $sql);
header('location: ../admin-view/contact-view.php');
exit();


?>