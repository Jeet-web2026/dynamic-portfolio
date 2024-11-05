<?php
session_start();
if (isset($_SESSION['login']) || $_SESSION['login'] = true) {
    session_destroy();
    header('Location: /portfolio/pages/login.php');
    exit;
}
?>