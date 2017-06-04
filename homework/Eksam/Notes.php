<?php
require_once('funkt.php');
session_start();
connect_db();

if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);}
	
include_once('head.html');

add();
	
include_once('foot.html');
?>