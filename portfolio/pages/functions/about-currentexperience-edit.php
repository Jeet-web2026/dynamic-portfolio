<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}

$designation = $_POST['CurrentD'];
$company = $_POST['CurrentC'];
$id = $_POST['hidden-CurrentID'];
$date = $_POST['CurrentDT'];
$location = $_POST['CurrentL'];


$sql = "UPDATE `about_current_experience` SET `position` = '$designation', `company` = '$company', `date` = '$date', `location` = '$location' WHERE `about_current_experience`.`id` = $id";

$result = mysqli_query($connection, $sql);
header('location: ../admin-view/about-view.php');
exit();
?>

