<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}

$projectName = $_POST['Pname'];
$Projectdescription = $_POST['desc'];
$usedTech = $_POST['Utech'];
$projectLink = $_POST['link'];
$projectId = $_POST['hidden-id'];


$sql = "UPDATE `all_projects` SET `project_name` = '$projectName', `project_description` = '$Projectdescription', `used_technologies` = '$usedTech', `project_link` = '$projectLink' WHERE `all_projects`.`project_id` = $projectId";

$result = mysqli_query($connection, $sql);
header('location: ../admin-view/project-view.php');
exit();
?>
