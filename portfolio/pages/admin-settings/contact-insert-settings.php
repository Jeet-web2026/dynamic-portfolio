<?php

$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}

$person_name = $_POST['contact-person-name'];
$person_email = $_POST['contact-person-email'];
$person_number = $_POST['contact-person-number'];
$person_purpose = $_POST['purpose'];

function dataInsert($name, $email, $number, $purpose)
{
    global $connection;
    $stmt = $connection->prepare("INSERT INTO `contact_details` (`contact_name`, `contact_email`, `contact_number`, `contact_reason`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $email, $number, $purpose);

    if ($stmt->execute()) {
        header('location: /portfolio/pages/contact-me.php');
        session_start();
        $_SESSION['submitted']= true;
    } else {
        echo "Error inserting data: " . $stmt->error;
    }
    $stmt->close();
}

dataInsert($person_name, $person_email, $person_number, $person_purpose);

