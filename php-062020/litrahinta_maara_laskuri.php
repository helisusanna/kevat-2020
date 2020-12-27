<!DOCTYPE html>
<html>
<head>
<title>PHP | Mehuasema</title>
<meta charset="utf-8"/>
</head>
<body>

<h2>Mehuasema</h2>

<div>				
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
        Litrahinta: <input name="hinta"><br/>
        Litramäärä: <input name="maara"><br/><br/>
        <input type="submit" name="nappi" value="Laske maksettava"><br/><br/>	
    </form>
    <?php
    if(isset($_REQUEST["nappi"])) { //jos nappia on painettu, niin ajetaan ohjelmalohko
        $hinta = $_REQUEST["hinta"];
        $maara = $_REQUEST["maara"];
        $tulos = $_REQUEST["hinta"] * $_REQUEST["maara"]; //laskee hinnan
        echo "Litrahinta: ".$hinta ." euroa <br/> Litramäärä: ".$maara ." litraa <br/> Maksettava: ".$tulos ." euroa"; //tulostaa litrahinnan, määrän ja maksettavan summan
    }
    ?>
</div>
</body>
</html>
