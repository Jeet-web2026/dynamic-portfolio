<?php

$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}


$image = $_POST['SliderImage'];
$heading = $_POST['SliderHeading'];
$description = $_POST['SliderDescp'];

$query = "INSERT INTO `about_slider`(`img`, `heading`, `description`) VALUES ('$image','$heading','$description')";
$run = mysqli_query($connection, $query);

if ($run) {
    header('location: ../admin-view/about-view.php');
    exit();
}
?>