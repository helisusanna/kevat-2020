tiedostonnimi = input("Anna tiedoston nimi: ")
try:
	tiedosto = open(tiedostonnimi,"r")
	sisalto = int(tiedosto.readline())
	sisalto = sisalto + 313
	print("Saatiin tulos ", sisalto)
except FileNotFoundError:
	print("Virheellinen tiedostonnimi")

except UnicodeDecodeError:
	print("Tiedoston sisältö virheellinen!")