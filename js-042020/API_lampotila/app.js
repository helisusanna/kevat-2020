//Ohjelma pyytää openweathermap.php-palvelinohjelmaa hakemaan halutun paikkakunnan lämpötilan
$(function(){
    $("#nappi").click(function(){
        let paikkakunta = $("#paikkakunta").val();

        $.ajax({url: "openweathermap.php", //pyydetään palvelinta ajamaan ohjelma
                method: "GET", //lähtevän datan metodi GET
                data: {"paikkakunta":paikkakunta}, //palvelimelle lähetettävä JSON data
                success: function(result) { //callback
                    tulostaCelsius(result);
                },
                    error: function(){
                        alert("Virhe");
                    }
        });
    });
});
//celsiusasteen tulostus
function tulostaCelsius(result){
    let kelvin = result.main.temp; //tiedoissa lämpötila on ilmoitettu kelvineinä
    let celsius = kelvin - 273.15;
    $("#laatikko").html(celsius.toFixed(1));
    }
