<?php
require_once('funktsioonid.php');
session_start();
connect_db();

if (isset($_POST['page']) && $_POST['page']!=""){
$page=htmlspecialchars($_POST['page']);}
	
include_once('head.html');

add();
kuva();


include_once('foot.html');

?>