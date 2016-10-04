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

<h2>Categories</h2>
<ul>
<?php
$sql = 'SELECT c.category_id, c.name
FROM film_category fc, category c
WHERE film_id=?
AND fc.category_id = c.category_id';
$stmt = $link->prepare($sql);
$stmt->bind_param('i', $fid);
$stmt->execute();
$stmt->bind_result($cid, $cnam);

//deletecategoryfromfilm.php

while($stmt->fetch()) {
	echo '<li><a href="filmlist.php?cid='.$cid.'">'.$cnam.'</a>';
	?>
<form action="deletecategoryfromfilm.php" method="post">
<input type="hidden" name="fid" value="<?=$fid?>">
<input type="hidden" name="cid" value="<?=$cid?>">
<input type="submit" value="Delete">
</form>	
	<?php
	echo '</li>';
}
?>
</ul>



<form action="addcategorytofilm.php" method="post">
	<input type="hidden" name="fid" value="<?=$fid?>">
    <select name="cid">
<?php
$sql = 'SELECT name, category_id FROM category';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cnam, $cid);
while ($stmt->fetch()){
	echo '<option value="'.$cid.'">'.$cnam.'</option>'.PHP_EOL;
}
?>
    </select>
    <input type="submit" value="Add to category">
</form>

<h2>Actors</h2>
<ul>
<?php
$sql = 'SELECT a.first_name, a.last_name, a.actor_id
FROM film_actor fa, actor a
WHERE film_id=?
AND fa.actor_id = a.actor_id';
$stmt = $link->prepare($sql);
$stmt->bind_param('i', $fid);
$stmt->execute();
$stmt->bind_result($afirstname, $alastname, $aid);

while($stmt->fetch()) {
	echo '<li><a href="actordetails.php?aid='.$aid.'">'.$afirstname.' '.$alastname.'</a></li>';
}
?>
</ul>



</body>
</html>