<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<h1>Client Information</h1>
<?php
// 
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';

$sql = 'SELECT `Client-Name`, `Client-Adress`, `Client-Contact-Name`, `Client-Contact Phone`, `Zip_Code_Zip_Code_ID` FROM `Client`
WHERE `Client-id`=?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($cnam, $cadr, $ccnam, $ccph, $czip);

while($stmt->fetch()) { }

echo '<h2>'.$cnam.'</h2>';
echo '<p>Address: '.$cadr.', '.$czip.'<br />Contact Person: '.$ccnam.'<br /> Contact Phone: '.$ccph.' </p>';
?>


<h2>Projects</h2>
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
	echo '<li><a href="projectdetail.php?cid='.$cid.'">'.$pnam.' '.$pdesc.' '.$psd.' '.$ped.' '.$popid.'</a></li>';
}
?>
</ul>
     
</body>
</html>