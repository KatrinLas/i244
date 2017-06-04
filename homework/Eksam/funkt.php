<?php
function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function add (){
	global $connection;
	global $errors;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array();
			if (!empty($_POST['username'])) {
			} else $errors[] = "Sisestage kasutajanimi";
			
			if (!empty($_POST['notes'])) {
			} else $errors[] = "Sisestage märkmed";
			
			if (empty($errors)) {
				$user = mysqli_real_escape_string($connection, $_POST["username"]);
				$notes = mysqli_real_escape_string($connection, $_POST["notes"]);
				$sql = "INSERT INTO klasberg_eksam (username, notes) VALUES ('{$user}','{$notes}')";
				$result = mysqli_query($connection, $sql) or die ("ei saa märkmeid lisatud".mysqli_error($connection));
			}
		}
	include_once('addform.html');
	}
	
?>