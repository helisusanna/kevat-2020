<!DOCTYPE html>
<html>
<head>
<title>PHP | Pinta-ala</title>
<meta charset="UTF-8">
</head>
<body>

<?php
    //Linkitetään luokkakirjasto mukaan
    include("class_lib.php");

    //Luodaan olio
    $asunto = new Asunto();
    //asetetaan arvot
    $asunto->asetaHinta(120000);
    $asunto->asetaPinta_ala(60);
 
    echo "Neliöhinta: ".$asunto->laskeNelioHinta(); //metodin kutsu, palauttaa neliöhinnan

?>

</body>
</html>