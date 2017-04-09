<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>8.Nädal</title>
<style type="text/css">

body{background:black;
}

#kujundus {
	margin:10px;
	padding: 20px;
	border-style:solid;
	border-color: red;
	background-color:white;
	line-height: 200%;
}

#n2ide {
		margin: 10px;
		padding: 5px;
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


<div id="kujundus">
<form action="8homework.php" method="post">
<textarea name="rows="5" cols=30 placeholder="Siia tuleb tekst"></textarea>
<br><input type="color" name="background">Taustavärv<br>
<input type="color" name="textcolor">Tekstivärvus</br>
<input type="number" name="textsize" min="9" max="32"> Teksti suurus (9-32)</br>
<input type="number" name="borderwidth" min="0" max="20"> Piirjoone laius (vahemik 0-20px)<br>
<select name="borderstyle"><br>
  	<option>solid</option>
  	<option>double</option>
  	<option>dotted</option>
</select>
<br><input type="color" name="bordercolor">Piirjoone värvus<br>
<input type="number" name="borderradius" min="0" max="100"> Piirjoone nurga raadius (vahemik 0-100px)<br>
<input type="submit" value="esita">



</div>




</body>
<p>
 <a href="http://validator.w3.org/check?uri=referer">
  <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
 </a>
</p>

</html>