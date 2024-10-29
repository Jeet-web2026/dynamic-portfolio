<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}

$projectName = $_POST['recentPname'];
$Projectdescription = $_POST['recentdesc'];
$usedTech = $_POST['recentUtech'];
$projectLink = $_POST['recentlink'];
$projectId = $_POST['recenthidden-id'];


$sql = "UPDATE `recent_projects` SET `project_name` = '$projectName', `project_description` = '$Projectdescription', `used_technologies` = '$usedTech', `project_link` = '$projectLink' WHERE `recent_projects`.`project_id` = $projectId";

$result = mysqli_query($connection, $sql);
header('location: ../admin-view/project-view.php');
exit();
?>
