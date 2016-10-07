<?php
const DB_HOST = 'simonelee.dk.mysql';
const DB_USER = 'simonelee_dk';
const DB_PASS = 'nYvNFMtA';
const DB_NAME = 'simonelee_dk';

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($link->connect_error) { 
	die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
}
$link->set_charset('utf8'); 
?>
