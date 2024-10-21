<?php

$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if(!$connection){
    die ('Connection error: ' . mysqli_connect_error());
}


?>