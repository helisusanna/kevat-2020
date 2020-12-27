$(document).ready(function(){
    $("#tulosta").click(function(){
            $.ajax({url: "elokuvat.json", 
                    success: function(result) {
                    tulostaTaulukko(result);
                }
            });
    });
    $("#haku").on("keyup", function() {//suoritetaan kun käyttäjä on nostanut näppäimen/ei juuri kirjoita mitään inputiin
        let value = $(this).val().toLowerCase();
        $("#laatikko tr").filter(function() {//suodatetaan laatikon riveistä
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
    
function tulostaTaulukko(result) { //ohjelma saa tiedoston elokuvat.json tiedot
    let taulukko = "";
    for(i = 0;i < result.length;i++){
        //lisätään kaikki elokuvien tiedot omille riveilleen muuttujaan taulukko
        taulukko +=  "<tr><td>" + result[i].numero + "</td><td>" + result[i].elokuva + "</td><td>" + result[i].vuosi + "</td><td>" + result[i].kategoria + "</td><td>" + result[i].ohjaaja +  "</td></tr>";
    };
    $(taulukko).appendTo("#laatikko"); //lisätään taulukko laatikkoon
};