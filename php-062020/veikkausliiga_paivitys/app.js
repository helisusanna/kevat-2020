$(function(){	
	$("#nappi").click(function(){
		console.log("poo");
		let urli = "app.php"; //palvelimella ajettava ohjelma
		//lisättävät tiedot
		let voittoJoukkue = $("#voittoJoukkue").val();
        let havioJoukkue = $("#havioJoukkue").val();
        let joukkue1 = $("#joukkue1").val();
        let joukkue2 = $("#joukkue2").val();

		//palvelimelle lähtevä data JSON-muodossa
		let data = {"havioJoukkue":havioJoukkue,"voittoJoukkue":voittoJoukkue, "joukkue1":joukkue1, "joukkue2":joukkue2};
		$.ajax({
			url: urli,
			data: data, //lisättävät tiedot
			success: function(result) { //jos saadaan tulos, lähetetään tulostettavaksi
				$("#laatikko").html(result); 
			}
        });
        $("#voittoJoukkue").val("");
        $("#havioJoukkue").val("");
        $("#joukkue1").val("");
        $("#joukkue2").val("");
    });
    
    joukkue1.style.display = "none";
    joukkue2.style.display = "none";
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                joukkue1.style.display = "block";
                joukkue2.style.display = "block";
            }
            else if($(this).prop("checked") == false){
                joukkue1.style.display = "none";
                joukkue2.style.display = "none";
            }
        });
});