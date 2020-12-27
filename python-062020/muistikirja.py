
import time
while True:
	valinta = input("(1) Lue muistikirjaa \n(2) Lisää merkintä \n(3) Tyhjennä muistikirja \n(4) Lopeta\n\nMitä haluat tehdä?: ")
	if valinta == "1":
		tiedosto = open("muistio.txt","r")
		sisalto = tiedosto.readlines()
		for i in sisalto:
			print(i)
		tiedosto.close()
	elif valinta == "2":
		merkinta = input("Kirjoita uusi merkintä: ")
		tiedosto = open("muistio.txt","a")
		aika = time.strftime("%X %x")
		tiedosto.write(merkinta)
		tiedosto.write(":::")
		tiedosto.write(aika)
		tiedosto.write("\n")
		tiedosto.close()
	elif valinta == "3":
		tiedosto = open("muistio.txt","w")
		print("Muistio tyhjennetty.")
		tiedosto.close()
	elif valinta == "4":
		print("Lopetetaan.")
		break
