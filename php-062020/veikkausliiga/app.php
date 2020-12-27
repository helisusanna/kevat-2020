<?php
//Ohjelma hakee tietokannan veikkausliiga taulusta sarjataulukko kaikki tiedot ja lähettää ne selaimelle JSON-muodossa

$dsn = "mysql:host=localhost;dbname=veikkausliiga";
$tunnus = "root";
$salasana = "";
//Tietokantayhteys
try {
	$yhteys = new PDO($dsn, $tunnus, $salasana);		
} catch (PDOExcetion $e) {
	die("Virhe: ".$e->getMessage());
}

$yhteys->exec("SET NAMES utf8");
//SQL-lauseen ajo
$kysely = $yhteys->prepare("SELECT * FROM sarjataulukko");
$kysely->execute();
//Lähetetään tiedot selaimelle JSON-muodossa
header("Content-type: application/json");
echo json_encode($kysely->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT);
?>