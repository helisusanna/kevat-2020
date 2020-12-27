<?php
	//yhteys kantaan
	$dsn = "mysql:host=localhost;dbname=veikkausliiga";
	$tunnus = "root";
	$salasana = "";

	try {
		$yhteys = new PDO($dsn, $tunnus, $salasana);		
	} catch (PDOExcetion $e) {
		die("Virhe: ".$e->getMessage());
	}

	$yhteys->exec("SET NAMES utf8");
	//haettava tieto tulee lomakkeelta
	$haettava = $_REQUEST['joukkue'];
	//sql-hakulause
	$kysely = $yhteys->prepare("SELECT * FROM sarjataulukko WHERE joukkue = :joukkue"); 
	$kysely->bindParam(":joukkue",$haettava); 
	$kysely->execute();
	//tulostetaan selaimelle
	header("Content-type: application/json");
	print json_encode($kysely->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT);
?>




