<?php

$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}


$projectName = $_POST['addRecentprName'];
$description = $_POST['addRecentprDesc'];
$usedTech = $_POST['addRecentprTech'];
$link = $_POST['addRecentprLink'];

$query = "INSERT INTO `recent_projects`(`project_name`, `project_description`, `used_technologies`, `project_link`) VALUES ('$projectName','$description','$usedTech','$link')";
$run = mysqli_query($connection, $query);

if ($run) {
    header('location: ../admin-view/project-view.php');
    exit();
}
?>