<?php //päivittää käyttäjän antamat tiedot tietokantaan

	$dsn = "mysql:host=localhost;dbname=veikkausliiga";
	$tunnus = "root";
	$salasana = "";

	try {
		$yhteys = new PDO($dsn, $tunnus, $salasana);		
	} catch (PDOExcetion $e) {
		die("Virhe: ".$e->getMessage());
	}

	$yhteys->exec("SET NAMES utf8");

	//syötteet muuttujiin
	$voittoJoukkue = $_REQUEST['voittoJoukkue'];
	$havioJoukkue = $_REQUEST['havioJoukkue'];
	//tasapelin tehneet joukkueet
	$joukkue1 = $_REQUEST['joukkue1'];
	$joukkue2 = $_REQUEST['joukkue2'];
	

	//SQL-lauseet
	$kysely1 = "UPDATE sarjataulukko SET voitot = voitot + 1 WHERE joukkue = '$voittoJoukkue'";
	$kysely2 = "UPDATE sarjataulukko SET ottelut = ottelut + 1 WHERE joukkue = '$voittoJoukkue'";
	$kysely3 = "UPDATE sarjataulukko SET tappiot = tappiot + 1 WHERE joukkue = '$havioJoukkue'";
	$kysely4 = "UPDATE sarjataulukko SET ottelut = ottelut + 1 WHERE joukkue = '$havioJoukkue'";
	$kysely5 = "UPDATE sarjataulukko SET ottelut = ottelut + 1 WHERE joukkue = '$joukkue1'";
	$kysely6 = "UPDATE sarjataulukko SET ottelut = ottelut + 1 WHERE joukkue = '$joukkue2'";
	$kysely7 = "UPDATE sarjataulukko SET tasapelit = tasapelit + 1 WHERE joukkue = '$joukkue1'";
	$kysely8 = "UPDATE sarjataulukko SET tasapelit = tasapelit + 1 WHERE joukkue = '$joukkue2'";

	//päivitetään tiedot
	$stmt1 = $yhteys->prepare($kysely1);
	$stmt2 = $yhteys->prepare($kysely2);
	$stmt3 = $yhteys->prepare($kysely3);
	$stmt4 = $yhteys->prepare($kysely4);
	$stmt5 = $yhteys->prepare($kysely5);
	$stmt6 = $yhteys->prepare($kysely6);
	$stmt7 = $yhteys->prepare($kysely7);
	$stmt8 = $yhteys->prepare($kysely8);

	//tieto onnistumisesta
	if($stmt1->execute() && $stmt2->execute() && $stmt3->execute() && $stmt4->execute() && $stmt5->execute() && $stmt6->execute() && $stmt7->execute() && $stmt8->execute()) {
		echo "Päivitetty";
	} else {
		echo "Päivitys ei onnistunut";
	}
?>
