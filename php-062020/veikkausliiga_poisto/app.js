//poisto-ohjelma
$(function(){	
$("#nappi").click(function(){
	let urli = "ot5d_ohjelma.php"; //palvelimella ajettava ohjelma
	let joukkue = $("#joukkue").val(); //poistettava joukkue
	let data = { "joukkue":joukkue }; //palvelimelle lähtevä data JSON-muodossa
	$.ajax({
		url: urli,
		data: data, //poistettava joukkue lähetetään palvelinohjelmalle 
		success: function(result) { 
			$("#laatikko").html(result);
		}
	});
});
});