/*
Ohjelma tallentaa käyttäjän syöttämät tiedot palautteet.json-tiedostoon,
toinen ohjelma tulostaa palautteet json-tiedostosta käyttäjän klikatessa sivulla olevaa nappia
*/

$(function(){
    let palauteArray = [];

    $("#nappi").click(function(){ //palautelomakkeen tallennusnappi

            let arviointi;
            if(document.getElementById("1").checked == true){
                arviointi =  "1";
            }
            if(document.getElementById("2").checked == true){
                arviointi =  "2";
            }
            if(document.getElementById("3").checked == true){
                arviointi =  "3";
            }
            if(document.getElementById("4").checked == true){
                arviointi =  "4";
            }
            if(document.getElementById("5").checked == true){
                arviointi =  "5";
            }
        
        let koodi = $("#koodi").val();
        let nimi = $("#nimi").val();
        let palaute = $("#palaute").val();
        let palauteOlio = { "koodi" : koodi, "nimi" : nimi, "arviointi" : arviointi, "palaute" : palaute }; //lomakkeelta tulevat tiedot
        palauteArray.push(palauteOlio); //lisätään palaute arrayn loppuun
        let palauteJSON = JSON.stringify(palauteArray); //JSON on stringiä

        $.ajax({url: "app.php", //palvelimella ajettava ohjelma
                method: "POST", //metodi POST kertoo php-ohjelmalle tiedon lisäyksestä
                data: palauteJSON, //kaikki palautteet
                success: function(result) {
                    console.log(result);
                },
                    error: function(){
                        alert("Virhe");
                    }
                });
        });


        $("#tulostaNappi").click(function(){ //sivun palautteet tulostusnappi tulostaa JSON-tiedostolle tallennetut palautteet

            $.ajax({url: "app.php",
            method: "GET",
            success: function(result) {
                if(result.length > 0){ //jos on viestejä, niin tulostetaan 
					palauteArray = JSON.parse(result);  //kopioidaan php-ohjelmalta tulevat viestit JSON:sta arrayhin
					let tulostus = "";
					for(var i = 0; i < palauteArray.length;i++){ 
						tulostus += "Toteutuksen koodi: " + palauteArray[i].koodi + "<br/>" + "Toteutuksen nimi: " + palauteArray[i].nimi + "<br/>" + "Opintojakson kokonaisarvio: " + palauteArray[i].arviointi + "<br/>" + "Onnistumisia ja kehittämisehdotuksia: " + palauteArray[i].palaute + "<br/><br/>";
					}
					$("#laatikko").html(tulostus); //laatikkoon tulostus
				}
			},
			error: function(xhr){
				alert("Virhe " + xhr.statusText);
			}
		    })
	    });
});