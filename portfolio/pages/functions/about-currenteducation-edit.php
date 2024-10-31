<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}

$Qualification = $_POST['crntED'];
$Degree = $_POST['crntEC'];
$id = $_POST['hidden-crntEID'];
$Date = $_POST['crntEDT'];
$Institute = $_POST['crntEL'];


$sql = "UPDATE `about_current_education` SET `qualification` = '$Qualification', `q_name` = '$Degree', `date` = '$Date', `name` = '$Institute' WHERE `about_current_education`.`id` = $id";

$result = mysqli_query($connection, $sql);
header('location: ../admin-view/about-view.php');
exit();
?>
