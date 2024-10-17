<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}

$image = $_POST['image'];
$description = $_POST['desc'];
$id = $_POST['hidden-id'];


$sql = "UPDATE `home_settings` SET `image` = '$image', `description` = '$description' WHERE `home_settings`.`sl_no` = $id";

$result = mysqli_query($connection, $sql);
header('location: ../admin-view.php');
exit();
