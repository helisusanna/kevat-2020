$(function(){	
	$("#nappi").click(function(){
		let urli = "app.php"; //palvelimella ajettava ohjelma
		let joukkue = $("#joukkue").val(); //haettava joukkue
		let data = { "joukkue":joukkue }; //palvelimelle lähtevä data JSON-muodossa
		$.ajax({
			url: urli,
			data: data,
			success: function(result) { //jos saadaan tulos, lähetetään tulostettavaksi
				tulosta(result); 
			},
			error: function(xhr) {
			alert("Virhe!");
		}
		});
	});
});

//tulostus
function tulosta(result){
	let luettelo = "<h1>Luettelo</h1><table class='table table-striped'><thead><tr><th>Joukkue</th><th>Ottelut</th><th>Voitot</th><th>Tasapelit</th><th>Häviöt</th><th>Pisteet</th></tr></thead><tbody>";
    let  i;
    let pisteet;
	for(i = 0; i < result.length; i++){ 
		pisteet = parseInt(result[i].voitot) * 3 + parseInt(result[i].tasapelit); //pisteiden lasku
		luettelo += "<tr><td>" + result[i].joukkue + "</td><td>" + result[i].ottelut + "</td><td>" + result[i].voitot + "</td><td>" + result[i].tasapelit +  "</td><td>" + result[i].tappiot + "</td><td>" + pisteet + "</td></tr>";
	}
	luettelo += "</tbody></table>";
	$("#tulostusAlue").html(luettelo); //Taulukon tulostus diviin
}