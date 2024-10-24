<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}

$designation = $_POST['exDesignation'];
$company = $_POST['exCompany'];
$id = $_POST['hidden-experienceId'];
$date = $_POST['exdate'];
$location = $_POST['exLocation'];


$sql = "UPDATE `about_experience` SET `position` = '$designation', `company` = '$company', `date` = '$date', `location` = '$location' WHERE `about_experience`.`id` = $id";

$result = mysqli_query($connection, $sql);
header('location: ../admin-view/about-view.php');
exit();
?>
