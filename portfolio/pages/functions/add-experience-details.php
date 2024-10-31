<?php

$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}


$designation = $_POST['exDescription'];
$company = $_POST['exCompany'];
$date = $_POST['exDate'];
$location = $_POST['exLocation'];

$query = "INSERT INTO `about_current_experience`(`position`, `company`, `date`, `location`) VALUES ('$designation','$company','$date','$location')";
$run = mysqli_query($connection, $query);

if ($run) {
    header('location: ../admin-view/about-view.php');
    exit();
}
?>