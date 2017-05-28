<?php
require_once('Content.php');
session_start();
connect_db();

$page="avaleht";
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}

include_once('views/head.html');

switch($page){
	case "login":
		logi();
	break;
	case "teenused":
		kuva_teenused();
	break;
	case "logout":
		logout();
	break;
	case "lisa":
		lisa();
	break;
	case "proovid":
		proovid();
	break;
	default:
		include_once('views/avaleht.html');
	break;
}

include_once('views/foot.html');

?>