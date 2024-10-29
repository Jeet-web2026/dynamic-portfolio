<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}

$image = $_POST['Sliderimage'];
$description = $_POST['description'];
$id = $_POST['hidden-sliderId'];
$heading = $_POST['headingData'];


$sql = "UPDATE `about_slider` SET `img` = '$image', `description` = '$description', `heading` = '$heading' WHERE `about_slider`.`id` = $id";

$result = mysqli_query($connection, $sql);
header('location: ../admin-view/about-view.php');
exit();
?>
