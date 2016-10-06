<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<h2>Project Information</h2>
<?php
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';

$sql = 'SELECT `client-name`
from client
where `client-id` = ?;';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($cnam);

while($stmt->fetch()) { }

echo '<h2>'.$cnam.'</h1>';
?>
</ul>

<h2>Project Details</h2>
<ul>
<?php 

$sql = 'select `project-name`, `project-description`, `project-start-date`, `project-end-date`, `other-project-details`
from `project`
where `project-id` = ?
and `client-id` = `client-id`';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pnam, $pdesc, $psd, $ped, $popid);

while($stmt->fetch()) { 
	echo '<p>'.'Project Name: '.$pnam.'</p>';
	echo '<p>'.'Project Description: '.$pdesc.'</p>';
	echo '<p>'.'Start Date: '.$psd.'</p>';
	echo '<p>'.'End Date: '.$ped.'</p>';
	echo '<p>'.'Other Project Details: '.$popid.'</p>';
	
}
	?>

</ul>


<h2>Resources</h2>
<ul>
<?php 
$sql = 'SELECT `Resource-Name` FROM Resources WHERE `Resources-ID` = ?';
$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($rnam);

while($stmt->fetch()){
	echo '<li><a href="resourcedetails.php?cid='.$cid.'">'.$rnam.'</a></li>'.PHP_EOL;

}
?>
</ul>
</body>
</html>