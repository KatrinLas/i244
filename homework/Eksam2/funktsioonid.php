


<?php
//yhendus andmebaasiga
function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

//lisa sisestatud andmed andmebaasi
function add (){
	global $connection;
	global $errors;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$errors = array();
				
			//errorid lähevad massiivi kui märkmed puuduvad
			if (!empty($_POST['notes'])) {
			} else $errors[] = "Sisestage märkmed";
			
			//kui erroreid ei ole 
			
			if (empty($errors)) {
				$notes = mysqli_real_escape_string($connection, $_POST["notes"]);
				//lisatud andmed lähevad nüüd tabelisse klasberg_eksam2
				$sql = "INSERT INTO klasberg_eksam2 (notes) VALUES ('{$notes}')";
				echo ("Andmed lisatud");
				//toimub kas andmete lisamine või ei saa andmeid lisada
								
				$result = mysqli_query($connection, $sql) or die ("ei saa märkmeid lisatud".mysqli_error($connection));		
			
			}
		}
	include_once('addform.html');
	}
	
function kuva (){
	global $connection;
	$kuva="SELECT * FROM klasberg_eksam2";
	$kuvaquery=mysqli_query($connection,$kuva);
		while($rida=mysqli_fetch_assoc($kuvaquery)){
			echo "{$rida['id']}: {$rida['notes']}<br/>";
	}	
	
}

function muuda (){
	global $connection;
	global $errors;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array();
			if (!empty($_POST['id'])) {
			} else $errors[] = "Sisestage märkmete ID number";
			
			if (!empty($_POST['notes'])) {
			} else $errors[] = "Sisestage uued märkmed";
			
			if (empty($errors)) {
				$id = mysqli_real_escape_string($connection, $_POST["id"]);	
				$uusnotes = mysqli_real_escape_string($connection, $_POST["notes"]);		
				$muuda="UPDATE klasberg_eksam2 SET notes='$uusnotes' WHERE id='$id'";
				if (mysql_query($connection, $muuda)){
				echo "Andmed muudetud";
				} else {
				echo "Ei saanud andmeid muudetud".mysqli_error($connection);
				
				}
			}
		include_once('muuda.html');	
	}		
}
	
?>