$(function(){	
	$.ajax({url: "app.php", //ajetaan palvelimella
	success: function(result) {
			tulostaLuettelo(result); //lähetetään result tulostettavaksi
		},
		error: function(xhr) {
			alert("Virhe");
		}
	});	 
});

function tulostaLuettelo(result){
	let luettelo = "<h1>Luettelo</h1><table class='table table-striped'><thead><tr><th>Joukkue</th><th>Ottelut</th><th>Voitot</th><th>Tasapelit</th><th>Häviöt</th><th>Pisteet</th></tr></thead><tbody>";
    let  i;
    let pisteet;
	for(i = 0; i < result.length; i++){ 
        pisteet = parseInt(result[i].voitot) * 3 + parseInt(result[i].tasapelit); //psiteiden lasku
		luettelo += "<tr><td>" + result[i].joukkue + "</td><td>" + result[i].ottelut + "</td><td>" + result[i].voitot + "</td><td>" + result[i].tasapelit +  "</td><td>" + result[i].tappiot + "</td><td>" + pisteet + "</td></tr>";
	}
	luettelo += "</tbody></table>";
	$("#tulostusAlue").html(luettelo); //Taulukon tulostus diviin
}