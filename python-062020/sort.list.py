tiedosto = open("sanoja.txt","r")
sanat = tiedosto.readlines()
lista = []
for i in sanat:
	lista.append(i)
lista.sort()
print("Sanat laitettuna aakkosjärjestykseen:")
for i in lista:
	print(i)