<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>7. kodutöö</title>
	</head>
	<body>
		<?php 
		$text="hommik";
		echo $text[5].$text[4].$text[3].$text[2].$text[1].$text[0];
		?>
		<?php
		$tekst="hommik";
		$length=strlen($tekst);
		$kirjuta="";
		for ($i=1; $i<$length+1;){
			$kirjuta.=$tekst[$length-$i];
			$i++;
		}
		echo $kirjuta;
		?>
	</body>
</html>

