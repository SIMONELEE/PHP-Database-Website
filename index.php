<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Clients</title>
</head>

<body>
<h1>Clients</h1>

<ul>
<?php
require_once 'dbcon.php';

$sql = 'SELECT `CLIENT-ID`, `Client-Name` FROM `Client`';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cid, $cnam);

/*Becuase there are no questionmarks (placeholders) there are no step of bind_param */

while($stmt->fetch()){
	echo '<li><a href="clientdetails.php?cid='.$cid.'">'.$cnam.'</a></li>'.PHP_EOL;
}

?>
</ul>

</body>
</html>