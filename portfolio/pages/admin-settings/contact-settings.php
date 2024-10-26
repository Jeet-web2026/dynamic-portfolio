<?php

$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}

function viewData(){
    global $connection;
    $view = "SELECT * FROM `contact_details`";
    $row = mysqli_query($connection, $view);
    return $row;
}

function viewsocialdata(){
    global $connection;
    $view = "SELECT * FROM `social_links`";
    $row = mysqli_query($connection, $view);
    return $row;
}




?>