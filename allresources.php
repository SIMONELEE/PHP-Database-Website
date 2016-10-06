<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>All Resources</title>
</head>

<body>
<ul>
<?php 

require_once 'dbcon.php';

$sql = 'SELECT `Resource-Name`, `Resource_Detail`, `Resource-Type-Code-ID` FROM Resources';

$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($rnam, $rdetail, $rtcid);

while($stmt->fetch()) { 
	echo '<h2>' .$rnam. '</h2>';
	echo '<p>'.$rtcid. ': ' .$rdetail. '</p>'.PHP_EOL;


}
?>

</ul>
</body>
</html>