<?php
$expire=100; // sessiooni aegumise aeg sekundites serveris
ini_set('session.gc-maxlifetime', $expire);
// alusta uus või jätka vana sessiooni
session_start();
require_once("vaated/head.html"); //lingin head.html-i
$pildid = array(
		1=>array('src'=>"pildid/nameless1.jpg", 'alt'=>"nimetu 1"),
		2=>array('src'=>"pildid/nameless2.jpg", 'alt'=>"nimetu 2"),
		3=>array('src'=>"pildid/nameless3.jpg", 'alt'=>"nimetu 3"),
		4=>array('src'=>"pildid/nameless4.jpg", 'alt'=>"nimetu 4"),
		5=>array('src'=>"pildid/nameless5.jpg", 'alt'=>"nimetu 5"),
		6=>array('src'=>"pildid/nameless6.jpg", 'alt'=>"nimetu 6"),
	);
$page="pealeht"; 
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}
switch($page){
	case "galerii":
		include("vaated/galerii.html"); //lingin galerii.html-i
	break;
	case "vote":
		if (!empty($_SESSION['voted_for'])){
			header('Location: ?page=tulemus');
		}
		include("vaated/vote.html"); //lingin vote.html-i
	break;
	case "tulemus":
		$id=false;
		if (isset($_POST['pilt']) && isset($pildid[$_POST['pilt']]))
			$id=htmlspecialchars($_POST['pilt']);
		include("vaated/tulemus.html"); //lingin tulemus.html-i
	break;
	default:
	include('vaated/pealeht.html'); //lingin pealeht.html-i
}
require_once("vaated/foot.html"); //lingin foot.html-i
?>