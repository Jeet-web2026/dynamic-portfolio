<?php

$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}


$qualification = $_POST['edQualification'];
$degree = $_POST['edDegree'];
$date = $_POST['edDate'];
$institute = $_POST['edInstitute'];

$query = "INSERT INTO `about_current_education`(`qualification`, `q_name`, `date`, `name`) VALUES ('$qualification','$degree','$date','$institute')";
$run = mysqli_query($connection, $query);

if ($run) {
    header('location: ../admin-view/about-view.php');
    exit();
}
?>