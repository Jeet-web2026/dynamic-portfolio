<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}

$Qualification = $_POST['ED'];
$Degree = $_POST['EC'];
$id = $_POST['hidden-EID'];
$Date = $_POST['EDT'];
$Institute = $_POST['EL'];


$sql = "UPDATE `about_education` SET `qualification` = '$Qualification', `q_name` = '$Degree', `date` = '$Date', `name` = '$Institute' WHERE `about_education`.`id` = $id";

$result = mysqli_query($connection, $sql);
header('location: ../admin-view/about-view.php');
exit();
?>
