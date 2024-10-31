<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}
function allDisplay(){
    global $connection;
    $fetchQuery = "SELECT * FROM `about_settings`";
    $fetchData = mysqli_query($connection, $fetchQuery);
    return $fetchData;
}

function sliderDisplay(){
    global $connection;
    $fetchQuery = "SELECT * FROM `about_slider`";
    $fetchData = mysqli_query($connection, $fetchQuery);
    return $fetchData;
}


function experienceDisplay(){
    global $connection;
    $fetchQuery = "SELECT * FROM `about_experience`";
    $fetchData = mysqli_query($connection, $fetchQuery);
    return $fetchData;
}

function currentexperienceDisplay(){
    global $connection;
    $fetchQuery = "SELECT * FROM `about_current_experience`";
    $fetchData = mysqli_query($connection, $fetchQuery);
    return $fetchData;
}

function educationDisplay(){
    global $connection;
    $fetchQuery = "SELECT * FROM `about_education`";
    $fetchData = mysqli_query($connection, $fetchQuery);
    return $fetchData;
}

function currenteducationDisplay(){
    global $connection;
    $fetchQuery = "SELECT * FROM `about_current_education`";
    $fetchData = mysqli_query($connection, $fetchQuery);
    return $fetchData;
}



?>