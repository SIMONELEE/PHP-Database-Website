<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Update</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php require 'menu.php';?>
<?php
$cnam = filter_input(INPUT_POST,'cnam', FILTER_SANITIZE_STRING) or die('Missing/illegal parameter');
$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter2');

require_once 'dbcon.php';

$sql = 'UPDATE `Client` 
SET `Client-Name`=?
WHERE `CLIENT-ID`=?';

$stmt = $link->prepare($sql);
$stmt->bind_param('si', $cnam, $cid);
$stmt->execute();
if ($stmt->affected_rows >0 ){
	echo 'Information Updated';
}
else {
	echo 'No change';

}
?>
<br>
<a href="clientdetails.php?cid=<?=$cid?>">Client details</a><br>
</body>

</html>