<?php //lisätään käyttäjän antamat tiedot tietokantaan

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

	//syötteet muuttujiin
	$joukkue = $_REQUEST['joukkue'];
	$ottelut = $_REQUEST['ottelut'];
	$voitot = $_REQUEST['voitot'];
	$tasapelit = $_REQUEST['tasapelit'];
	$tappiot = $_REQUEST['tappiot'];

	//ajetaan SQL-lause
	$kysely = $yhteys->prepare("INSERT INTO sarjataulukko (joukkue, ottelut, voitot, tasapelit, tappiot) VALUES (:joukkue, :ottelut, :voitot, :tasapelit, :tappiot)");
	$kysely->bindParam(":joukkue",$joukkue);
	$kysely->bindParam(":ottelut",$ottelut);
	$kysely->bindParam(":voitot",$voitot);
	$kysely->bindParam(":tasapelit",$tasapelit);
	$kysely->bindParam(":tappiot",$tappiot);

	//tieto onnistumisesta
	if($kysely->execute()) {
		echo "Lisätty";
	} else {
		echo "Lisäys ei onnistunut";
	}
?>