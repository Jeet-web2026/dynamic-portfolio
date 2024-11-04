<?php

$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}


$projectName = $_POST['addprName'];
$description = $_POST['addprDesc'];
$usedTech = $_POST['addprTech'];
$link = $_POST['addprLink'];

$query = "INSERT INTO `all_projects`(`project_name`, `project_description`, `used_technologies`, `project_link`) VALUES ('$projectName','$description','$usedTech','$link')";
$run = mysqli_query($connection, $query);

if ($run) {
    header('location: ../admin-view/project-view.php');
    exit();
}
?>