<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}

function recent_projects(){
    global $connection;
    $fetchquery = "SELECT * FROM `recent_projects`";
    $row = mysqli_query($connection, $fetchquery);
    return $row;
}

function ongoing_projects(){
    global $connection;
    $fetchquery = "SELECT * FROM `ongoing_projects`";
    $row = mysqli_query($connection, $fetchquery);
    return $row;
}

function all_projects(){
    global $connection;
    $fetchquery = "SELECT * FROM `all_projects`";
    $row = mysqli_query($connection, $fetchquery);
    return $row;
}


?>