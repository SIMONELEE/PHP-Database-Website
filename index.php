<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Clients</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php require 'menu.php';?>

<h1>Clients</h1>

<ul>

<!--ADD PROJECT-->
<?php
require_once 'dbcon.php';


$sql = 'SELECT `CLIENT-ID`, `Client-Name` FROM `Client` ORDER BY `Client-Name`';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cid, $cnam);

/*Becuase there are no questionmarks (placeholders) there are no step of bind_param */

while($stmt->fetch()){
	echo '<li><a href="clientdetails.php?cid='.$cid.'">'.$cnam.'</a></li>'.PHP_EOL;
}

?>
</ul>
<br>
<h2> Add a new client </h2>
<form  class="signupform" action="add.php" method="post" required>
    <input type="text" name="$cnam" placeholder="Client Name" required><br>
    <input type="text" name="$cad" placeholder="Adress" required><br>
    <input type="text" name="$ccnam" placeholder="Contact Name" required><br>
    <input type="text" name="$cphone" placeholder="Contact Phone" required><br>
      <input type="text" name="$czip" placeholder="Contact Zip" required><br>
    <button type="submit" value="Add New Client">Add New Client</button>
</form

</body>
</html>