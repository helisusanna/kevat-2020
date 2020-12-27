$(function(){ //kun sivu on latautunut
    
    let listaArray = []; //arrayn alustus
    if(localStorage.getItem("muistilista") != null) { //jos local storage on olemassa
        tulosta();
    }

    function tulosta(){ //tulostaa, jos on jotain tulostettavaa
        if (localStorage.getItem('muistilista') != null){
            let muistilistaJSON = localStorage.getItem("muistilista"); //haetaan muistilista local storagesta JSON-muodossa
            listaArray = JSON.parse(muistilistaJSON); //sijoitetaan JSON:in tietueet arraylle
            if (listaArray == null){
                listaArray = [];
            }
            //tulostetaan lista, ensin parent ul
            $("#lista").html = "";
            $("#lista").html("<ul></ul>");
            for(let i = 0;i < listaArray.length; i++){ //kaikki alkiot omalle riville
                $("#lista ul").append("<li>" + listaArray[i].muistiinpano + "</li>");
            }
        }
    }

    $("#lisaa_nappi").click(function(){
        if($("#inputti").val() != ""){
            let listaOlio = {
                muistiinpano : $("#inputti").val() //käyttäjän syöttämä tieto sijoitetaan listaOlioon
            }
            listaArray.push(listaOlio); //olio lisätään arrayn loppuun
            localStorage.setItem("muistilista",JSON.stringify(listaArray)); //tallennetaan muistilista-local storageen
        }
        $("#inputti").val("");
        tulosta(); //tulostus
    });

    $("#lista").on("click","li",function() { //kun käyttäjä klikkaa riviä
    let selected_index = $(this).index(); //klikattavan tiedon indeksi arrayssa
    listaArray.splice(selected_index,1); //poistaa arraysta sen, jota on klikattu
    localStorage.setItem("muistilista", JSON.stringify(listaArray)); //tallennetaan muuttunut tilanne
    tulosta();//tulostetaan muuttunut tilanne
    });

});