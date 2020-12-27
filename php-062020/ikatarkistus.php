<!DOCTYPE html>
<html>
<head>
<title>PHP | Ikätarkistus</title>
<meta charset="UTF-8">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'];?>">
    Syötä ikä:
    <input type="number" name="ika"/>
    <input type="submit" name="laheta" value="Lähetä"> 
</form>

<?php
function tarkastaIka($ika) { //funktio saa käyttäjän syöttämän iän parametrina
   if($ika >= 18 ) {
       return "true";
   }
   else { return "false";
    }
}
 
if(isset($_REQUEST["laheta"])){
    $ika = $_REQUEST["ika"]; 
    $boolean = tarkastaIka($ika); //funktion kutsu
    echo $boolean;
}
?>

</body>
</html>