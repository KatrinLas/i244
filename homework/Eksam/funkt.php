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
			
			//errrorid lähevad massiivi kui kasutajanimi puudub
			$errors = array();
			if (!empty($_POST['username'])) {
			} else $errors[] = "Sisestage kasutajanimi";
			
			//errorid lähevad massiivi kui märkmed puuduvad
			if (!empty($_POST['notes'])) {
			} else $errors[] = "Sisestage märkmed";
			
			//kui erroreid ei ole 
			
			if (empty($errors)) {
				$user = mysqli_real_escape_string($connection, $_POST["username"]);
				$notes = mysqli_real_escape_string($connection, $_POST["notes"]);
				//lisatud andmed lähevad nüüd tabelisse klasberg_eksam
				$sql = "INSERT INTO klasberg_eksam (username, notes) VALUES ('{$user}','{$notes}')";
				echo ("Andmed lisatud");
				//toimub kas andmete lisamine või ei saa andmeid lisada
								
				$result = mysqli_query($connection, $sql) or die ("ei saa märkmeid lisatud".mysqli_error($connection));		
				/* if ($connection->query($sql) === TRUE) {
					echo ("Märkmed edukalt lisatud, vaata allpool");
				} else {
					echo "Error: " . $sql . "<br>" . $connection->error;
				} */
				
			
			}
		}
	include_once('addform.html');
	}
	
function kuva (){
	global $connection;
	$kuva="SELECT * FROM klasberg_eksam";
	$kuvaquery=mysqli_query($connection,$kuva);
		while($rida=mysqli_fetch_assoc($kuvaquery)){
			echo "{$rida['username']}: {$rida['notes']}<br/>";
	}	
	
}
	
?>