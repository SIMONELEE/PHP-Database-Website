<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Add</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php require 'menu.php';?>
<?php
$cnam = filter_input(INPUT_POST, '$cnam', FILTER_SANITIZE_STRING) or die('Missing/illegal parameter1');
$cad = filter_input(INPUT_POST, '$cad', FILTER_SANITIZE_STRING) or die('Missing/illegal parameter2');
$ccnam = filter_input(INPUT_POST, '$ccnam', FILTER_SANITIZE_STRING) or die('Missing/illegal parameter3');
$cphone = filter_input(INPUT_POST, '$cphone', FILTER_VALIDATE_INT) or die('Missing/illegal parameter4');
$czip = filter_input(INPUT_POST, '$czip', FILTER_VALIDATE_INT) or die('Missing/illegal parameter5');

require_once 'dbcon.php';

$sql = 'INSERT INTO `Client`(`Client-Name`, `Client-Adress`, `Client-Contact-Name`, `Client-Contact-Phone`, `Zip_Code_Zip_Code_ID`) VALUES (?, ?, ?, ?, ?)';
$stmt = $link->prepare($sql);
$stmt->bind_param('sssii', $cnam, $cad, $ccnam, $cphone, $czip);
$stmt->execute();
if ($stmt->affected_rows >0 ){
	echo 'Client added!';
}
else {
	echo 'No change - client was already added';
//	echo $stmt->error;
}
?>
<br><br>
<a href="index.php?cid=<?=$cid?>">Back to clients</a><br>