<!DOCTYPE html>
<html>
<head>
<title>PHP | Palautelomake</title>
<meta charset="utf-8"/>

</head>
<body>
<?php

$palautevirhe = "";
$nimivirhe = "";
$emailvirhe = ""; //alustetaan mahdolliset virheviestit

if(isset($_REQUEST["laheta"])){ //jos lähetä-nappia on painettu
    $nimi = "Nimi: " . $_REQUEST["nimi"] . "<br/>";
    $email = "Sähköposti: " . $_REQUEST["email"] . "<br/>";
    $asiakkuus = "Asiakkuuden luonne: " . $_REQUEST["asiakkuus"] . "<br/>"; 
    $palauteviesti = "Palaute:<br/> " . $_REQUEST["palaute"] . "<br/><br/>"; //tallennettavat rivit
    $palauteRivi = $nimi . $email . $asiakkuus . $palauteviesti;
    
    $palaute = $_REQUEST["palaute"];
    $palautelength = strlen($palaute); //lasketaan palautemerkkijonon merkkien määrä
    if ($palautelength < 5){
        $palautevirhe = "Palauteviesti on liian lyhyt <br/>"; //jos määrä on alle viisi, tulostuu virheteksti
    } 
    if (empty($_POST["nimi"])) {
        $nimivirhe = "Syötä nimesi <br/>"; //jos nimeä ei ole annettu, tulsotuu virheteksti
    }
    if (empty($_POST["email"])) {
        $emailvirhe = "Syötä sähköpostiosoitteesi <br/>"; //jos sähköpostiosoitetta ei ole annettu, tulsotuu virheteksti
    }

    if ($palautelength > 4 && empty($_POST["nimi"]) == false && empty($_POST["email"]) == false){ 
        //jos palauteviestin pituus on vähintään 5 merkkiä eikä lomakkeen muut kentät ole tyhjiä, tallennetaan tiedot tekstitiedostoon palvelimelle
        //opettajan tekstitiedostoesimerkistä
        if(file_exists("palautteet.txt")) { //jos tiedosto on, niin avataan lisäämistä varten
            $t = fopen("palautteet.txt", "a") or die("Ei voi avata tiedostoa!"); //avataan lisäystä varten
        }
        else {
            $t=fopen("palautteet.txt","w"); //luodaan tiedosto, jos ei ole
        }
        fwrite($t, $palauteRivi); //kirjoitetaan tiedostoon
        fclose($t); //suljetaan eli vapautetaan tiedosto toisten käyttöön
    }
}
?>

<h2>Palautelomake</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

Nimi: <br/>
<input type="text" name="nimi"/><br/>
<span><?php echo $nimivirhe;?></span>
<br/>
Sähköposti: <br/>
<input type="text" name="email"/><br/>
<span><?php echo $emailvirhe;?></span>
<br/>

Asiakkuuden luonne. Olen :
<select name="asiakkuus">
    <option value="Henkilöasiakas">Henkilöasiakas</option>
    <option value="Yritysasiakas">Yritysasiakas</option>
</select><br/><br/>

Palaute: <br/>
<textarea type="text" name="palaute"></textarea><br/>
<span><?php echo $palautevirhe;?></span>
<input type="submit" name="laheta" value="Lähetä">  
</form>

</body>
</html>

