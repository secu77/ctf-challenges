# Ascii Mode

## Puntos
`20`

## Pista
None

## Flag
* `bitup19{112971169711697115}`
* `bitup19{112 97 116 97 116 97 115}`
* `bitup19{112,97,116,97,116,97,115}`
* `bitup19{112  97 116  97 116  97  115}`
* `bitup19{[112, 97, 116, 97, 116, 97, 115]}`

## Adjuntos
None

## Deploy
None

## Descripcion
¿Crees que eres capaz de decir "patatas" con tan sólo 256 carácteres? (no te olvides castear a int)

## Solucion
El reto nos sugiere que la flag se obtiene al transformar la cadena "patatas" utilizando 256 carácteres, dicha pista sumado con el propio titulo del reto, no da que pensar a que quieren que transformemos la cadena a código ascii y, por si nos quedaban dudas, es justamente lo que se obtiene cuando convertimos (castear) un caracter a entero. Podemos utilizar el comando `echo -n "patatas" | od -An -vtu1` para generar los valores correspondientes en código ascii, o desde python con `print([ord(i) for i in "patatas"])`.

## Notas
Toda información es representada en bits. Un numero decimal (base 10), por ejemplo, 5, puede representarse en binario (base 2) como '101'. El código Ascii nos permite representar letras y caracteres especiales utilizando 8 bits. Por ejemplo, el mismo numero 5, se representaria como '0011 0101' (cuyo valor en base 10 o decimal es 53). Puede parecer enrevesado pero es importante entender el concepto de las bases porque es la base (valga la redundancia), para utilizar correctamente algoritmos y mucho más.

## Referencias
* https://es.wikipedia.org/wiki/ASCII