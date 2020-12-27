<?php
//Ohjelma poistaa halutun joukkueen tiedot kannasta

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
$joukkue = $_REQUEST['joukkue'];

//ajetaan SQL-lause
$kysely = $yhteys->prepare("DELETE FROM sarjataulukko WHERE joukkue = :joukkue");
$kysely->bindParam(":joukkue",$joukkue);

if($kysely->execute()) {
    echo "Joukkue poistettu!";
} else {
    echo "Poisto ei onnistunut";
}
?>