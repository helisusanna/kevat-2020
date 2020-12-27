import random
peli = True
tasapeli = 0
voitot = 0
kierros = 0
while peli:
	valinta = input("Jalka, Ydinase vai Torakka? (Lopeta lopettaa):")
	valinta_1 = random.randint(0,2)
	if valinta == "Jalka":
		print("Sinä valitsit: ", valinta)
	if valinta == "Torakka":
		print("Sinä valitsit: ", valinta)
	if valinta == "Ydinase":
		print("Sinä valitsit: ", valinta)
	if valinta == "Lopeta":
		print("Pelasit",kierros,"kierrosta, joista voitit",voitot,"ja pelasit tasan",tasapeli,"peliä.")
        #peli = False
        #break
	if valinta_1 == 1:
		valinta_1 = "Jalka"
		print("Tietokone valitsi:",valinta_1)
	if valinta_1 == 0:
		valinta_1 = "Torakka"
		print("Tietokone valitsi:",valinta_1)
	if valinta_1 == 2:
		valinta_1 = "Ydinase"
		print("Tietokone valitsi:",valinta_1)

	if valinta_1 == "Jalka" and valinta == "Jalka":
		print("Tasapeli!")
		tasapeli += 1
		kierros += 1
	if valinta == "Torakka" and valinta_1 == "Torakka":
		print("Tasapeli!")
		tasapeli += 1
		kierros += 1
	if valinta == "Ydinase" and valinta_1 == "Ydinase":
		print("Tasapeli!")
		tasapeli += 1
		kierros += 1
	if valinta == "Jalka" and valinta_1 == "Torakka":
		print("Voitit!")
		voitot += 1
		kierros += 1
	if valinta == "Ydinase" and valinta_1 == "Jalka":
		print("Voitit!")
		voitot += 1
		kierros += 1
	if valinta == "Torakka" and valinta_1 == "Ydinase":
		print("Voitit!")
		voitot += 1
		kierros += 1
	if valinta == "Jalka" and valinta_1 == "Ydinase":
		print("Hävisit!")
		kierros += 1
	if valinta == "Torakka" and valinta_1 == "Jalka":
		print("Hävisit!")
		kierros += 1
	if valinta == "Ydinase" and valinta_1 == "Torakka":
		print("Hävisit!")
		kierros += 1