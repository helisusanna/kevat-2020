$(document).ready(function(){

    $("#nappi").click(function(){
            //Haetaan palvelimelta tiedosto puhelinluettelo.json
            $.ajax({url: "asunnot.json",success: function(result) { 				
                //lähetetään palvelimelta tullut data (result-array) parsittavaksi.				
                tulostaTiedot(result); 
            }, error: function(xhr){ //Virheen käsittely, jos esim. tiedostoa ei löydy
                alert("Virhe!"); //Tähän tulee tilanteeseen sopiva virheen käsittely
            }
        });
    });
});

    function tulostaTiedot(result){
        $(".carousel-inner").html("");
        $("#tbody").html("");

        let kohdenumero = $("#kohdenumero").val();//syöttötieto lomakkeelta

        for(i = 0;i < result.length;i++){//Käydään koko JSON läpi eli kaikki kuvat peräkkäin
            if(result[i].kohdenumero == kohdenumero){ //haku eli jos aihe on sama kuin käyttäjän haluama
                //kuvan lähde (src) on kuvatiedoston nimi
                $(".carousel-inner").append("<div class='carousel-item active'>" + "<img class='d-block w-100' src='" + result[i].kuva1 + "' alt='first slide'/>" + "</div>");
                $(".carousel-inner").append("<div class='carousel-item'>" + "<img class='d-block w-100' src='" + result[i].kuva2 + "' alt='second slide'/>" + "</div>");
                $(".carousel-inner").append("<div class='carousel-item'>" + "<img class='d-block w-100' src='" + result[i].kuva3 + "' alt='third slide'/>" + "</div>");
                $("#tbody").append("<tr><td>" + result[i].katuosoite + "</td><td>" + result[i].postinumero + "</td><td>" + result[i].postitoimipaikka + "</td><td>" + result[i].hinta + " € </td></tr>");
            }
        }
    };

