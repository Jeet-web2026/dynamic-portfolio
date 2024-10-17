<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}



function displayData()
{
    global $connection;
    $fetchQuery = "SELECT * FROM `home_settings` WHERE `sl_no`= 31";

    $allData = mysqli_query($connection, $fetchQuery);

    return $allData;
}

function anotherdisplayData()
{
    global $connection;
    $fetchQuery = "SELECT * FROM `home_settings`";

    $allData = mysqli_query($connection, $fetchQuery);

    return $allData;
}

function displaygroupdescriptionData()
{
    global $connection;
    $fetchQuery = "SELECT * FROM `home_settings` WHERE `sl_no`= 19";

    $allData = mysqli_query($connection, $fetchQuery);

    return $allData;
}

function displaygroupdescriptionDataTwo()
{
    global $connection;
    $fetchQuery = "SELECT * FROM `home_settings` WHERE `sl_no`= 20";

    $allData = mysqli_query($connection, $fetchQuery);

    return $allData;
}

function displaygroupdescriptionDataThree()
{
    global $connection;
    $fetchQuery = "SELECT * FROM `home_settings` WHERE `sl_no`= 25";

    $allData = mysqli_query($connection, $fetchQuery);

    return $allData;
}

function displaygroupdescriptionDataFour()
{
    global $connection;
    $fetchQuery = "SELECT * FROM `home_settings` WHERE `sl_no`= 21";

    $allData = mysqli_query($connection, $fetchQuery);

    return $allData;
}

function displaygroupdescriptionDataFive()
{
    global $connection;
    $fetchQuery = "SELECT * FROM `home_settings` WHERE `sl_no`= 23";

    $allData = mysqli_query($connection, $fetchQuery);

    return $allData;
}

function displaygroupdescriptionDataSix()
{
    global $connection;
    $fetchQuery = "SELECT * FROM `home_settings` WHERE `sl_no`= 22";

    $allData = mysqli_query($connection, $fetchQuery);

    return $allData;
}

function displaygroupdescriptionDataSeven()
{
    global $connection;
    $fetchQuery = "SELECT * FROM `home_settings` WHERE `sl_no`= 24";

    $allData = mysqli_query($connection, $fetchQuery);

    return $allData;
}

function displaygroupdescriptionDataEight()
{
    global $connection;
    $fetchQuery = "SELECT * FROM `home_settings` WHERE `sl_no`= 26";

    $allData = mysqli_query($connection, $fetchQuery);

    return $allData;
}

function projectOne()
{
    global $connection;
    $fetchQuery = "SELECT * FROM `home_settings` WHERE `sl_no`= 27";

    $allData = mysqli_query($connection, $fetchQuery);

    return $allData;
}

function projectTwo()
{
    global $connection;
    $fetchQuery = "SELECT * FROM `home_settings` WHERE `sl_no`= 28";

    $allData = mysqli_query($connection, $fetchQuery);

    return $allData;
}

function projectThree()
{
    global $connection;
    $fetchQuery = "SELECT * FROM `home_settings` WHERE `sl_no`= 29";

    $allData = mysqli_query($connection, $fetchQuery);

    return $allData;
}

function projectFour()
{
    global $connection;
    $fetchQuery = "SELECT * FROM `home_settings` WHERE `sl_no`= 30";

    $allData = mysqli_query($connection, $fetchQuery);

    return $allData;
}