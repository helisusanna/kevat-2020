import time
try:
	tiedosto = open("muistio.txt","r")
	tiedostonnimi="muistio.txt"
	tiedosto.close()
except IOError:
	print("Oletusmuistioa ei löydy, luodaan tiedosto.")
	tiedosto = open("muistio.txt","a")
	tiedostonnimi="muistio.txt"
	tiedosto.close()
while True:
	print("Käytetään muistiota: ",tiedostonnimi,"\n(1) Lue muistikirjaa \n(2) Lisää merkintä \n(3) Tyhjennä muistikirja \n(4) Vaihda muistiota\n(5) Lopeta\n")
	valinta = input("Mitä haluat tehdä?: ")
	if valinta == "1":
		tiedosto = open(tiedostonnimi,"r")
		sisalto = tiedosto.readlines()
		for i in sisalto:
			print(i)
		tiedosto.close()
	elif valinta == "2":
		merkinta = input("Kirjoita uusi merkintä: ")
		tiedosto = open(tiedostonnimi,"a")
		aika = time.strftime("%X %x")
		tiedosto.write(merkinta)
		tiedosto.write(":::")
		tiedosto.write(aika)
		tiedosto.write("\n")
		tiedosto.close()
	elif valinta == "3":
		tiedosto = open(tiedostonnimi,"w")
		print("Muistio tyhjennetty.")
		tiedosto.close()
	elif valinta == "4":
		tiedostonnimi = input("Anna tiedoston nimi: ")
		try:
			tiedosto = open(tiedostonnimi,"r")
			tiedosto.close()
		except IOError:
			print("Tiedostoa ei löydy, luodaan tiedosto.")
			tiedosto = open(tiedostonnimi,"a")
			tiedosto.close()
	elif valinta == "5":
		print("Lopetetaan.")
		break