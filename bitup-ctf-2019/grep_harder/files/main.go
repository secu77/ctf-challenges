package main

import "fmt"

func main() {
	names := [6]string{
		"Hans aka G0d",
		"Yo soy el hijo de Pato",
		"y est0podriaserunaflagtr0ll?",
		"Me dieron cert en HTB por ser Padre,",
		"Penetration testing Certified XDDDDDD",
		"bitup19{d1rty4ndn0ts3cur3flag}",
	}

	a := names[0:2]
	b := names[1:3]
	fmt.Println(a, b)

	fmt.Println(names[3:5])

	c := "8==========D"
	b[0] = c
	b[1] = "SHON ME MANDA PERRO"
	fmt.Println(a, b)
}