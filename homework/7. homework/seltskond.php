<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Seltskond</title>
<style type="text/CSS">
	div{display:inline-block; 
	width:29%; 
	border:solid #c0c0c0 2px; 
	border-radius:5px;
	padding:10px; 
	margin:1%;}
	p {text-align: center;
		}
</style>	
</head>
<body>

<?php
$seltskond=array(
	array('nimi'=>'Malle','vanus'=>40,'hobi'=>'joonistamine'),
	array('nimi'=>'Toomas','vanus'=>33,'hobi'=>'laulmine'),
	array('nimi'=>'Piret','vanus'=>42,'hobi'=>'jooksmine'),
	array('nimi'=>'Ants','vanus'=>38,'hobi'=>'matkamine'),
);
foreach ($seltskond as $inimene){
	include 'seltskond.html';
}
?>
	

</body>
</html>