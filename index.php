<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Clients</title>
</head>

<body>
<h1>Clients</h1>

<ul>

<!--ADD PROJECT-->


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

<h3> Add a new client </h3>
<form action="add.php" method="post">
    <input type="text" name="$cnam" placeholder="Client Name"><br>
    <input type="text" name="$cad" placeholder="Adress"><br>
    <input type="text" name="$ccnam" placeholder="Contact Name"><br>
    <input type="text" name="$cphone" placeholder="Contact Phone"><br>
      <input type="text" name="$czip" placeholder="Contact Zip"><br>
    <input type="submit" value="Add New Client">
</form

</body>
</html>