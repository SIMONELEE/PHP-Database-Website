<?php
/*Instead of having the variable $curpage on each of the .php files, the basename function with the superglobal $_SERVER['PHP_SELF'] will read the filename of the active .php file and then it can be placed only in the menu.php*/
$curpage = basename($_SERVER['PHP_SELF']);


/*Afterwards I've used a conditional statement that if the file .php (depending on which one is active) is the current/active page it should be in the class "active".*/
?>

<header>
<nav>
<ul>
  <li><a href="index.php" <?php if($curpage == 'index.php') {
	echo 'class="active"';
	} ?>>Clients</a></li>
    <li><a href="allresources.php" <?php if($curpage == 'contact.php') {
	echo 'class="active"';
	} ?>>All Resources</a></li>
    
    
</ul>
</nav>
</header>
