
def main():
	from math import sin
	from math import cos
	laskin=True
	luku1=otaluku()
	luku2=otaluku()
	while laskin:
		print("(1) + \n(2) - \n(3) * \n(4) / \n(5)sin(luku1/luku2) \n(6)cos(luku1/luku2)\n(7)Vaihda luvut\n(8)Lopeta \nValitut luvut: ",luku1,luku2,)
		valinta=input("Tee valinta (1-8): ")
		if valinta=="1":
			print("Tulos on: ",luku1 + luku2)
			continue
		elif valinta=="2":
			print("Tulos on: ",luku1 - luku2)
			continue
		elif valinta=="3":
			print("Tulos on: ",luku1 * luku2)
			continue
		elif valinta=="4":
			print("Tulos on: ",luku1 / luku2)
			continue
		elif valinta=="5":
			tulos = sin(luku1/luku2)
			print("Tulos on: ",tulos)
			continue
		elif valinta=="6":
			tulos = cos(luku1/luku2)
			print("Tulos on: ",tulos)
			continue
		elif valinta=="7":
			laskin=False
			main()
		elif valinta=="8":
			laskin=False
			break
			
def otaluku():
	while True:
		try:
			luku=input("Anna luku: ")
			luku=int(luku)
			return luku
		except Exception:
			print("Virheellinen syöte!")
			
if __name__ == "__main__":
	main()
	