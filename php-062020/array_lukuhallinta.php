<!DOCTYPE html>
<html>
<head>
<title>PHP | Array</title>
<meta charset="utf-8"/>
</head>
<body>

<?php 
$taulukko = array(10, 6, 13, 4, 21); //taulukko

foreach ($taulukko as $alkio){
    echo $alkio."<br/>"; //alkioiden tulostus
}

sort($taulukko); //järjestetään luvut pienimmästä suurimpaan
echo "<br/> Pienin: ".$taulukko[0] ."<br/>"; //tulostetaan ensimmäinen eli pienin luku

rsort($taulukko); //järjestetään luvut suurimmasta pienimpään
echo "<br/> Suurin: ".$taulukko[0] ."<br/>"; //tulostetaan ensimmäinen eli suurin luku

$keskiarvo = array_sum($taulukko) / count($taulukko); //lasketaan taulukon luvut yhteen ja jaetaan summa taulukon alkioiden määrällä
echo "<br/> Keskiarvo: " .$keskiarvo; //tulostetaan aiemman laskun tulos eli keskiarvo
?>

</body>
</html>