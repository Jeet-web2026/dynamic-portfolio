<?php

$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}


$Name = $_POST['addLinkName'];
$path = $_POST['addLinkpath'];

$query = "INSERT INTO `social_links`(`link_name`, `links_path`) VALUES ('$Name','$path')";
$run = mysqli_query($connection, $query);

if ($run) {
    header('location: ../admin-view/contact-view.php');
    exit();
}
?>