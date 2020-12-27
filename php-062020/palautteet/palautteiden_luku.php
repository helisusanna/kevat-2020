<!DOCTYPE html>
<html>
<head>
<title>PHP | Palautteet</title>
<meta charset="UTF-8">

</head>
<body>
<?php

	if(file_exists("palautteet.txt")) { //jos tiedosto on olemassa
		$t = fopen("palautteet.txt", "r") or die("Ei voida avata tiedostoa!"); //avataan
		$palautteet = fread($t, filesize("palautteet.txt")); //Luetaan tiedostosta kaikki 
		echo $palautteet; //lähetetään selaimelle
		fclose($t); //suljetaan tiedosto
	}
	else {
		echo "Tiedostoa ei löydy!";
	}
?>
</body>
</html>

