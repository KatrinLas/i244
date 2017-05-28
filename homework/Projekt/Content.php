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

function logi(){
	//siin saab tavakasutaja ja admin sisse logida
	global $connection;
	global $errors;
	if (!empty($_SESSION['user'])){
		header("Location: ?page=teenused");
	}
	else {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array();
			//kui pole sisestatud kasutajanime, siis sisesta
			if (!empty($_POST['user'])) {
			}else $errors[] = "Sisestage kasutajanimi";
			//kui pole sisestatud parooli, siis sisesta
			if (!empty($_POST['pass'])) {
			} else $errors[] = "Sisestage parool";
				
			if (empty($errors)) {
				$kasutaja = mysqli_real_escape_string($connection, $_POST["user"]);
				$parool = mysqli_real_escape_string($connection, $_POST["pass"]);
				$sql = "SELECT id, roll FROM klasberg_laborikasutajad WHERE username = '{$kasutaja}' and passw= SHA1('{$parool}')";
				$result = mysqli_query($connection, $sql) or die ("ei saa parooli ja kasutajat kontrollitud".mysqli_error($connection));
				//$rida = mysqli_num_rows($result);
				
				if (mysqli_num_rows($result)) {
					$_SESSION['user'] = $_POST['user'];
					$_SESSION['roll'] = mysqli_fetch_assoc($result)['roll'];
					header("Location: ?page=teenused");
				} else {
					header("Location: ?page=login");
				}	
            }
        
		}  
    }include_once('views/login.html');

}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}
function kuva_teenused(){
	include_once('views/teenused.html');
}

function proovid(){
	global $connection;
	global $errors;
	//suunab sisselogimisele
	if (empty($_SESSION['user'])){
		header("Location: ?page=login");
	
	$sql="SELECT * FROM klasberg_labor";
	$result=mysqli_query($connection, $sql) or die("Ei saa proovide andmeid kätte".mysqli_error($connection));
	print_r($result);
	header("Location: ?page=proovid");
	}	
}
	
	//if ($result->num_rows > 0) {
		// output data of each row
		//while($row = $result->fetch_assoc()) {
		//	echo "<br> id: " . $row["id"]. " - Proovi tähis:".$row["t2his"]." ".$row["materjal"]." ".$row["koht"]." ".$row["aeg"]."<br>;
		//}else {
		//echo "0 results";
	//include_once('views/proovid.html');
	




function lisa(){
	global $connection;
	global $errors;
	//suunab sisselogimisele
	if (empty($_SESSION["user"])){
		header("Location: ?page=login");
	}
	//kui on tavakasutaja suunab
	elseif ($_SESSION['roll'] == 'user') {
		header("Location: ?page=teenused");
	}
	//kui ei ole tavakasutaja ehk on adminn suunab
	else {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array();
			if (!empty($_POST['tähis'])) {
			} else $errors[] = "Sisestage proovi tähis";
			
			if (!empty($_POST['materjal'])) {
			} else $errors[] = "Sisestage proovi materjal";
			
			if (!empty($_POST['koht'])) {
			} else $errors[] = "Sisestage proovivõtu koht";
			
			if (!empty($_POST['aeg'])) {
			} else $errors[] = "Sisestage proovivõtu aeg";
			
			if (empty($errors)) {
				$tähis = mysqli_real_escape_string($connection, $_POST["tähis"]);
				$materjal = mysqli_real_escape_string($connection, $_POST["materjal"]);
				$koht = mysqli_real_escape_string($connection, $_POST["koht"]);
				$aeg = mysqli_real_escape_string($connection, $_POST["aeg"]);
				$sql = "INSERT INTO klasberg_labor (tähis, materjal, koht, aeg) VALUES ('{$tähis}', '{$materjal}', '{$koht}', '{$aeg}')";
				$result = mysqli_query($connection, $sql) or die ("ei saa proovi lisatud".mysqli_error($connection));
				$id = mysqli_insert_id($result);
				if ($id) {
					$_SESSION['user'] = $_POST['user'];
					header("Location: ?page=teenused");
				} else {
					header("Location: ?page=lisaproov");
				}	
			}
			
		}
	
	}	
	include_once('views/lisaproov.html');
	}
	
	
function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));
 	if ( in_array($_FILES[$name]["type"], $allowedTypes)
 		&& ($_FILES[$name]["size"] < 100000)
 		&& in_array($extension, $allowedExts)) {
   
	// fail õiget tüüpi ja suurusega
 		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
				$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
				return "";
 		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
	// vigu ei ole
				if (file_exists("pildid/" . $_FILES[$name]["name"])) {
		// fail olemas ära uuesti lae, tagasta failinimi
					$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
					return "pildid/" .$_FILES[$name]["name"];
				} else {
		// kui kõik ok, aseta pilt 6igesse kausta
					move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
					return "pildid/" .$_FILES[$name]["name"];
			}	
 		}
	
 	} else {
 		return "";
 	}
}	

?>