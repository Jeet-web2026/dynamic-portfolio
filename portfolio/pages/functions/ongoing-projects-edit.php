<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_portfolio');
if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}

$projectName = $_POST['ongoingPname'];
$Projectdescription = $_POST['ongoingdesc'];
$usedTech = $_POST['ongoingUtech'];
$projectLink = $_POST['ongoinglink'];
$projectId = $_POST['ongoinghidden-id'];


$sql = "UPDATE `ongoing_projects` SET `project_name` = '$projectName', `project_description` = '$Projectdescription', `used_technologies` = '$usedTech', `project_link` = '$projectLink' WHERE `ongoing_projects`.`project_id` = $projectId";

$result = mysqli_query($connection, $sql);
header('location: ../admin-view/project-view.php');
exit();
?>
