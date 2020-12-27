<?php
//session aloitus 
 session_start(); 
?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
</head>
<body>					
<?php

if(isset($_SESSION['tulija'])) { //toivotetaan tulija tervetulleeksi mikäli tämä on tullut kirjautumisen kautta etusivulle
	echo "<h2> Tervetuloa " . $_SESSION['tulija'] . "</h2>"; 
}
else {
   echo "<h2>Et ole tervetullut!</h2>";
}

//poistaa session
if(isset($_REQUEST["poistaSessio"])) {
	session_unset();
	session_destroy();
	header("location: index.php"); //ajaa ekasivu.php:n
}
?>
<br/><br/>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 			
	<input type="submit" name="poistaSessio" value="Poista sessio, jos on ja palaa etusivulle"/>			
</form>	
</div>
</body>
</html>