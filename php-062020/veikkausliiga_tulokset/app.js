$(function(){	
	$("#nappi").click(function(){
		let urli = "app.php"; //palvelimella ajettava ohjelma
		//lisättävät tiedot
		let joukkue = $("#joukkue").val();
		let ottelut = $("#ottelut").val(); 
		let voitot = $("#voitot").val();
		let tasapelit = $("#tasapelit").val();
		let tappiot = $("#tappiot").val();

		//palvelimelle lähtevä data JSON-muodossa
		let data = {"joukkue":joukkue, "ottelut":ottelut, "voitot":voitot, "tasapelit":tasapelit, "tappiot":tappiot };
		$.ajax({
			url: urli,
			data: data, //lisättävät tiedot
			success: function(result) { //jos saadaan tulos, lähetetään tulostettavaksi
				$("#laatikko").html(result); 
			}
		});
	});
});