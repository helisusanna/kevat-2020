function setCookie(){ //ohjelma tallentaa valinnan cookieen käyttäjän klikatessa buttonia aseta
    let cname = "tervehdys"; //cookien nimi
    let cvalue = document.getElementById("kieli").value; //käyttäjän valitsema kieli
    let expires = 30; //cookien voimassaolon vuorokausimäärä
    let d = new Date();
    d.setTime(d.getTime() + (expires * 24 * 60 * 60 * 1000)); //UNIX-aika + 30:n vuorokauden millisekunnit
    expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires; //cookien asetus
} 
 
function checkCookie(){ //ohjelma lukee cookien
    let kieli = document.cookie;
    if(kieli.includes("englanti")) { //jos arvo on englanti, tulostuu Welcome
        document.getElementById("laatikko").innerHTML = "Welcome";
    }
    else if(kieli.includes("suomi")) { //jos arvo on suomi, tulostuu Tervetuloa, jne.
        document.getElementById("laatikko").innerHTML = "Tervetuloa";
    }
    else if(kieli.includes("espanja")) {
        document.getElementById("laatikko").innerHTML = "Bienvenida";
    }
    else if(kieli.includes("ruotsi")) {
        document.getElementById("laatikko").innerHTML = "Välkommen";
    }
    else if(kieli.includes("saksa")) {
        document.getElementById("laatikko").innerHTML = "Willkommen";
    }
    else {
        document.getElementById("laatikko").innerHTML = "";
    }
}

function delCookie() { //cookien poisto
    let cname = "tervehdys =; expires=0";
    document.cookie = cname ;
}
	