<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<?php
// 
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

?>

<h1>Client #<?=$cid?> <br></h1>
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT `Client-Name`, `Client-Adress`, `Client-Contact-Name`, `Client-Contact Phone`, `Zip_Code_Zip_Code_ID` FROM `Client`';

$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cnam, $cadr, $ccnam, $ccph, $czip);

while($stmt->fetch()) {
	echo '<h2>'.$cnam.'</h2>';
	echo '<p>'.$cadr. ', '.$czip.' </p>';
	echo '<p>'.$ccnam.'</p>';
	echo '<p>'.$ccph.'</p>';
	
	'<li><a href="projectdetails.php?fid='.$cid.'">'.$cnam.' <br>'.$cadr.'</a></li>'.PHP_EOL;
}

?>
</ul>


</body>
</html>