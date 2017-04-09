<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>8.Nädal</title>
<?php
	$background_color="white";
	if (isset($_POST['background']) && $_POST['background']!="") {
 	  $background=htmlspecialchars($_POST['background']);
	} 
	$text_color="black";
	if (isset($_POST['color']) && $_POST['color']!="") {
 	  $color=htmlspecialchars($_POST['color']);
	} 
	$border_width='5';
	if (isset($_POST['borderwidth']) && $_POST['borderwidth']!="") {
 	  $borderwidth=htmlspecialchars($_POST['borderwidth']);
	} 
	$border_style='solid';
	if (isset($_POST['borderstyle']) && $_POST['borderstyle']!="") {
 	  $borderstyle=htmlspecialchars($_POST['borderstyle']);
	} 
	$border_color='green';
	if (isset($_POST['bordercolor']) && $_POST['bordercolor']!="") {
 	  $bordercolor=htmlspecialchars($_POST['bordercolor']);
	} 
	$radius='23';
	if (isset($_POST['borderradius']) && $_POST['borderradius']!="") {
 	  $borderradius=htmlspecialchars($_POST['borderradius']);
	} 
	$sisestatud_tekst="Siia kuvatakse sinu tekst";
	if (isset($_POST['text']) && $_POST['text']!="") {
 	  $sisestatud_tekst=htmlspecialchars($_POST['text']);
	} 
	$text_size="15";
	if (isset($_POST['textsize']) && $_POST['textsize']!="") {
 	  $textsize=htmlspecialchars($_POST['textsize']);
	} 



?>
<style type="text/css">



#kujundus {
	margin:10px;
	padding: 10px;
	border-style:solid;
	border-color: red;
	background-color:white;
	line-height: 150%;
}

#n2ide {
	margin: 10px;
	padding: 30px;
	border-style:solid;
	border-color: green;
	background-color:white;
	background-color: <?php echo $background; ?>;
	color: <?php echo $textcolor; ?>;
	font-size: <?php echo $textsize; ?>px;
	border-width: <?php echo $borderwidth; ?>px;
	border-style: <?php echo $borderstyle; ?>;
	border-color: <?php echo $bordercolor; ?>;
	border-radius: <?php echo $borderradius; ?>px;
}
	


</style>


</head>
<body>
<div id="n2ide">
	<?php echo $sisestatud_tekst; ?>
</div>

<div id="kujundus">
	<form action="8homework.php" method="post">
	
	<textarea name="text" rows=5 cols=30 placeholder="Siia kirjuta tekst"></textarea>
	<br><input type="color" name="background">Taustavärv<br>
	<input type="color" name="textcolor">Tekstivärvus</br>
	<input type="number" name="textsize" min="9" max="32"> Teksti suurus (9-32)</br>
	<input type="font" name="textstyle"> Teksti stiil
	<br>
<p>
	<input type="number" name="borderwidth" min="0" max="20"> Piirjoone laius (vahemik 0-20px)<br>
	<select name="borderstyle"><br>
		<option>solid</option>
		<option>double</option>
		<option>dotted</option>
	</select>
	<input type="color" name="bordercolor">Piirjoone värvus<br>
	<input type="number" name="borderradius" min="0" max="100"> Piirjoone nurga raadius (vahemik 0-100px)<br>
<p>
	<input type="submit" value="esita">

</div>




</body>
<p>
 <a href="http://validator.w3.org/check?uri=referer">
  <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
 </a>
</p>

</html>