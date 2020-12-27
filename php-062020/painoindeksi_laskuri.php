<!DOCTYPE html>
<html>
<head>
<title>PHP | Painoindeksi</title>
<meta charset="utf-8"/>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'];?>">
	Pituus: <input name="pituus"><br/>
	Paino: <input name="paino"><br/>
	<input type="submit" name="nappi" value="Laske painoindeksi"><br/><br/>
</form>

<?php

if(isset($_REQUEST["nappi"])) { 
$pituus = $_REQUEST["pituus"] / 100; //käyttäjän syöttämä pituus jaettuna sadalla, jotta saadaan painoindeksin laskuun desimaaliluku
$paino = $_REQUEST["paino"];
$indeksiLasku = $paino / ($pituus * $pituus); //lasketaan painoindeksin
$indeksi = number_format($indeksiLasku, 1); //pyöristetään painoindeksi yhden desimaalin tarkkuudelle
echo "Painoindeksisi on ".$indeksi."<br/>";

if($indeksi < 18.4) { //jos painoindeksi on alle 18,4, tulostuu Alhainen paino
    echo "Alhainen paino";
}
else if($indeksi >= 18.5 && $indeksi <= 24.9) { //jos painoindeksi on 18,5-24,9, tulostuu Normaali paino
    echo "Normaali paino";
}
else if($indeksi >= 25.0 && $indeksi <= 29.9) { //jos painoindeksi on 25 -29,9, tulostuu Lievä ylipaino
    echo "Lievä ylipaino";
}
else if($indeksi >= 30.0) { //painoindeksi 30 tai yli, tulostuu Merkittävä ylipaino
    echo "Merkittävä ylipaino";
}
}
?>

</body>
</html>