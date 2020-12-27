<!DOCTYPE html>
<html>
<head>
<title>PHP | Ilmapallokauppa</title>
<meta charset="utf-8"/>
</head>
<body>

<h2>Ilmapallokauppa</h2>

<form action="<?php echo $_SERVER['PHP_SELF'];?>">
	Ilmapallojen lukumäärä: <input name="pallomaara"><br/>
	<input type="submit" name="nappi" value="Tulosta kuitti"><br/><br/>
</form>

<?php //aikaa taisi mennä 15min

if(isset($_REQUEST["nappi"])) { 
$pallomaara = $_REQUEST["pallomaara"];
$summa = number_format($pallomaara * 1.5,2);

if($pallomaara > 15){
    $alennus = number_format($summa * 0.1,2);
}
else {
    $alennus = 0;
}
$maksettava = number_format($summa - $alennus,2);

echo "Palloja: ".$pallomaara." kpl <br/> Kappalehinta: 1.50 € <br/> Loppusumma: ".$summa." € <br/> Alennus: ".$alennus." € <br/><b> Maksettava: ".$maksettava." €";
}
?>

</body>
</html>