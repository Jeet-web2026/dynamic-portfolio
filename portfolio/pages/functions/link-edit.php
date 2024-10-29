<?php

$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}



$id = $_POST['linkSrNo'];
$name = $_POST['linkNme'];
$path = $_POST['link-path'];


$sql = "UPDATE `social_links` SET `link_name`='$name',`links_path`='$path' WHERE `links_id`='$id'";
$result = mysqli_query($connection, $sql);
header('location: ../admin-view/contact-view.php');
exit();
