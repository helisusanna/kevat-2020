<!DOCTYPE html>
<html>
<head>
<title>PHP | Syntymävuosi</title>
<meta charset="UTF-8">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'];?>">
    Syötä henkilötunnus:
    <input type="text" name="hetu"/>
    <input type="submit" name="laheta" value="Lähetä"> 
</form>

<?php
function tulostaVuosi($hetu) { //funktio saa käyttäjän syöttämän henkilötunnuksen parametrina
    if ($hetu[6] == "+") { //jos seitsemäs merkki on +, henkilö on syntynyt 1800-luvulla
        return "18" .$hetu[4] .$hetu[5];//ohjelma palauttaa 18 ja syntymävuoden henkilötunnuksesta
    }
    if ($hetu[6] == "-") { //jos seitsemäs merkki on -, henkilö on syntynyt 1900-luvulla
        return "19" .$hetu[4] .$hetu[5]; //ohjelma palauttaa 19 ja syntymävuoden henkilötunnuksesta
    }
    }
    if ($hetu[6] == "A") { //jos seitsemäs merkki on A, henkilö on syntynyt 2000-luvulla
        return "20" .$hetu[4] .$hetu[5]; //ohjelma palauttaa 20 ja syntymävuoden henkilötunnuksesta
    }
    }
    else { return "Virhe"; } //jos seitsemäs merkki ei ole mikään näistä
}
 
if(isset($_REQUEST["laheta"])){
    $hetu = $_REQUEST["hetu"]; 
    $vuosi = tulostaVuosi($hetu); //funktion kutsu
    echo $vuosi;
}
?>

</body>
</html>