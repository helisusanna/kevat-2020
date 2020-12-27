<!DOCTYPE html>
<html>
<head>
<title>PHP | Toisto</title>
<meta charset="utf-8"/>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'];?>">
    Nimi: <input name="nimi"><br/>
    Montako kertaa tulostetaan: <input name="kerrat"><br/>
	<input type="submit" name="nappi" value="Tulosta"><br/><br/>
</form>

<?php 

if(isset($_REQUEST["nappi"])) { 

$kerrat = $_REQUEST["kerrat"];
$nimi = $_REQUEST["nimi"];

for($i = 0;$i < $kerrat;$i++) { //toistaa tulostuksen niin kauan/monta kertaa, kun i on pienempi kuin käyttäjän syöttämä kertamäärä
    echo $nimi."<br/>"; //tulostus
}
}
?>

</body>
</html>