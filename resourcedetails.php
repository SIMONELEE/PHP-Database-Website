<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Resource Details</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php require 'menu.php';?>
<h2>Resource Details</h2>

<ul>
<?php 
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';
$sql = 'SELECT `Resource-Name`, `Resource_Detail`, `Resource-Type-Code-ID` 
FROM `Resources` 
where `Resources-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($rnam, $rdetail, $rtcid);

while($stmt->fetch()) { 
	echo '<h1>'.$rnam.'</h1>';
	echo '<p>'.'<b>'.'Resource Details: '.'</b>'.$rdetail.'</p>';
	echo '<p>'.'<b>'.'Resource Type Code ID: '.'</b>'.$rtcid.'</p>';
	echo '<br>';
	
}
?>
 <form class="signupform" type="button" action="allresources.php" method="get">
 	<button>See all resources</button>
</form>
</ul>
<br>
<h2>Working projects</h2>
<ul>
<?php 

$sql = 'SELECT `Project-ID`, `Resources-ID` from Project_has_Resources 
WHERE `Resources-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pid, $rid);

while($stmt->fetch()) { 
	echo '<p>'.'<b>'.'Project ID: '.'</b>'.$pid.' '.'<b>'.'Resource ID: '.'</b>'.$rid.'</p>';
	echo '<br>';
	
}
?>
</ul>
<form class="signupform" action="delete.php" method="post">
    	<input type="text" name="pid" placeholder="Project ID"><br>
        <input type="text" name="rid" placeholder="Resource ID"><br>
    	<button type="submit" value="Delete Resource">Delete Resource</button>
    </form>

</body>
</html>