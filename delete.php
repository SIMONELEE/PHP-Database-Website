<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Delete</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php require 'menu.php';?>
<?php
$pid = filter_input(INPUT_POST, 'pid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter1');
$rid = filter_input(INPUT_POST, 'rid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');


require_once 'dbcon.php';

$sql = 'DELETE FROM `Project_has_Resources` 
WHERE `Project-ID` = ? 
AND `Resources-ID` = ?';

$stmt = $link->prepare($sql);
$stmt->bind_param('ii', $pid, $rid);
$stmt->execute();
//$stmt->bind_result($pid, $rid);

if ($stmt->affected_rows >0 ){
	echo 'Resource deleted';
}
else {
	echo 'No change - resource stil existing';

}

?>
<br>
<a href="allresources.php?cid=<?=$cid?>">Resource details</a>
</body>
</html>