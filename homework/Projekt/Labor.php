<?php
require_once('Content.php');
session_start();
connect_db();

$page="pealeht";
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}

include_once('views/head.html');

switch($page){
	case "login":
		logi();
	break;
	case "Otsing":
	//kuva otsing();
	break;
	case "logout":
		logout();
	break;
	case "lisa":
		lisa();
	break;
	default:
		include_once('views/avaleht.html');
	break;
}

include_once('views/foot.html');

?>