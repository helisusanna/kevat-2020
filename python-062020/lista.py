lista = []
while True:
	valinta = input("Haluatko\n(1)Lisätä listaan\n(2)Poistaa listalta vai\n(3)Lopettaa?:")
	if valinta == "1":
		lisays = input("Mitä lisätään?: ")
		lista.append(lisays)
	elif valinta == "2":
		maara = len(lista)
		print("Listalla on",maara,"alkiota.")
		poisto = input("Monesko niistä poistetaan?:\n")
		try:
			poisto = int(poisto)
			lista.pop(poisto)
		except Exception:
			print("Virheellinen valinta.")
	elif valinta == "3":
		print("Listalla oli tuotteet:")
		for i in lista:
			print(i)
		break
	else:
		print("Virheellinen valinta.")