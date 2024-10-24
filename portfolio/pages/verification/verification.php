<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}


$loginEmail = $_POST['loginemail'];
$loginPassword = $_POST['loginpassword'];
$loginMob = $_POST['mnum'];

$checkQuery = "SELECT * FROM `login_credintials` WHERE emailid='$loginEmail'";
$run = mysqli_query($connection, $checkQuery);

if ($run && mysqli_num_rows($run) == 1) {
    $row = mysqli_fetch_assoc($run);
    $storedHash = $row['password'];

    $password_verify = password_verify($loginPassword, $storedHash);

    if ($password_verify) {
        session_start();
        $_SESSION['login'] = true;
        header('Location: ../admin-view/index-admin-view.php');
        exit();
    } else {
        $_SESSION['loginemail'] = $loginEmail;
        header('Location: /portfolio/pages/login.php');
        exit();
    }
} else {
    $_SESSION['loginemail'] = $loginEmail;
    header('Location: /portfolio/pages/login.php');
    exit();
}
