<?php
 session_start(); 
?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
</head>
<body>
<h3>Rekisteröidy luomalla verkkotunnukset</h3>				
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 			
	Tunnus: <input name="tunnus"/><br/>
	Salasana: <input name="salasana" type="password"/><br/><br/>	
	<input type="submit" name="rekisteroidy" value="Rekisteröidy"/><br/><br/>			
</form>
<?php

$dsn = "mysql:host=localhost;dbname=tunnukset";
$user = "root";
$password = "";
try {
	$yhteys = new PDO($dsn, $user, $password);		
} catch (PDOExcetion $e) {
	die("Virhe: ".$e->getMessage());
}
$yhteys->exec("SET NAMES utf8");

if(isset($_SESSION['tulija'])) { //jos kirjautuminen on voimassa, ohjataan tulija etusivulle
    echo "<h2> Tervetuloa " . $_SESSION['tulija'] . "</h2>";
    header("location: etusivu.php");
}

if(isset($_REQUEST["rekisteroidy"])) { //jos käyttäjä rekisteröityy tallennetaan tiedot tunnustaulukkoon, salasana salataan crypt-funktiolla
    $tunnus = $_REQUEST['tunnus'];
    $salasana = $_REQUEST['salasana'];
    $salt = "k32duem01vZsQ2lB8g0s"; //suolaus
    $salasana = crypt($salasana,$salt); //tiivisteen laskeminen

    $kysely = $yhteys->prepare("INSERT INTO tunnustaulukko (tunnus, salasana) VALUES (:tunnus, :salasana)");
    $kysely->bindParam(":tunnus",$tunnus);
    $kysely->bindParam(":salasana",$salasana);

    if($kysely->execute()) { //jos tallennus onnistui, voi kirjautua sisään
	    echo "Kirjaudu nyt sisään";
    } else {
	    echo "Rekisteröityminen ei onnistunut";
    }   
}
?>
<h3>Kirjautuminen</h3>				
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 			
	Tunnus: <input name="kirjauduTunnus"/><br/>
	Salasana: <input name="kirjauduSalasana" type="password"/><br/><br/>	
	<input type="submit" name="kirjaudu" value="Kirjaudu" /><br/><br/>			
</form>
<?php
//kopioitu osoitteesta https://www.w3schools.com/php/php_mysql_select_where.asp
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "tunnukset";

// Create connection
$conn = new mysqli($servername, $user, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_REQUEST["kirjaudu"])) { 
    $haettavaTunnus = $_REQUEST['kirjauduTunnus'];
    $suolattavaSalasana = $_REQUEST['kirjauduSalasana'];
    $suola = "k32duem01vZsQ2lB8g0s";
    $haettavaSalasana = crypt($suolattavaSalasana,$suola); //lasketaan tiiviste, jotta voidaan tarkistaa onko salasana oikein ja sama kuin tietokantaan tallennettu
    $sql1 = "SELECT tunnus FROM tunnustaulukko WHERE tunnus='$haettavaTunnus'";
    $sql2 = "SELECT salasana FROM tunnustaulukko WHERE salasana='$haettavaSalasana'"; //haettavat tiedot kannasta
    $result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);

    if ($result1->num_rows > 0 && $result2->num_rows > 0) {
    //mikäli salasanaa sekä tunnusta palautuu ainakin yksi rivi, annetaan sessiolle nimi ja ohjataan etusivulle
        while($row = $result1->fetch_assoc() && $row = $result2->fetch_assoc()) {
            $_SESSION['tulija'] = $_REQUEST['kirjauduTunnus'];
            header("location: etusivu.php");
        }
    } else {
    echo "Kirjautuminen ei onnistunut";
    }
}
$conn->close();
?>
</body>
</html>

