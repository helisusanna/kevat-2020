<?php
$pyynnon_metodi = $_SERVER["REQUEST_METHOD"];

switch ($pyynnon_metodi) {
    
    case "GET": 
			$sisalto = file_get_contents("palautteet.json");
			header("Content-type: application/json");
			print json_encode($sisalto, JSON_PRETTY_PRINT);
            break;
    
    case "POST": 
			$dataa = file_get_contents("php://input");//selaimelta tuleva data
			file_put_contents("palautteet.json", $dataa); //tallennus palvelimen levylle
			print "Lisätty";
        break;
}

?>