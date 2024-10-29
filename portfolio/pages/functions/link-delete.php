<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if(!$connection){
    die ('Connection error: ' . mysqli_connect_error());
}
$id = $_GET['slno'];
$sql = "DELETE FROM `social_links` WHERE `links_id` = $id";

$result = mysqli_query($connection, $sql);
header('location: ../admin-view/contact-view.php');
exit();


?>