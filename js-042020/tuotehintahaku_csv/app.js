$(document).ready(function(){
    $("#tulosta").click(function(){ //kun käyttäjä klikkaa nappia, ohjelma hakee palvelimelta taulukon
        $.ajax({url: "tuotteet.csv", //haettava tiedosto on tuotteet.csv
                  success: function(result) { //jos haku onnistuu, tiedosto kopioidaan result-muuttujaan
                  tulostaTaulukko(result); //lähetetään funktiolle tulostaTaulukko
                  }
              });
    });
});
  
function tulostaTaulukko(result) { //result-muuttujalla on koko tiedoston tuotteet.csv sisältö
  let rivit = [];
  let rivi = [];
  rivit = result.split(/\n/g); //tiedoston sisältö pätkitään rivinvaihdon kohdalta, lisätään arrayhin: rivit
  let taulukko = "<table border='1'>";
  for(i = 0;i < rivit.length - 1;i++){ //käydään rivit läpi
      rivi = rivit[i].split(";"); // tuote ja hinta erilleen puolipisteen kohdalta
      taulukko += "<tr><td>" + rivi[0] + "</td><td>" + rivi[1] + "</td></tr>" //lisätään rivi kerrallaan taulukkoon
  }
  taulukko += "</table>";
  $("#laatikko").html(taulukko);  //taulukon tulostus
}