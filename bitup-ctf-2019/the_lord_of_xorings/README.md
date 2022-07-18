# The Lord Of The XORings

## Puntos
`30`

## Pista
None

## Flag
`bitup19{4t4rl0s_3n_l4s_t1n13bl4s}`

## Adjuntos
None

## Deploy
None

## Descripcion
Un Anillo para gobernarlos a todos, un Anillo para encontrarlos, un Anillo para atraerlos a todos y ... ¿75-1a-5d-1e-00-5f-32-31-5a-02-33-03-75-1d-36-18-5d-01-70-5d-0b-00-58-1c?

## Solucion
De la descripción del reto extraemos el mensaje cifrado, y por el titulo nos damos cuenta que se ha aplicado un cifrado basado en una operación XOR con una clave que, si revisamos la descripcion, veremos que nos sugiere una palabra en particular "Anillo" (la cual repite varias veces). Utilizando la página https://www.browserling.com/tools/xor-decrypt podemos descifrar el mensaje y obtener la flag.

## Notas
La operación de cifrado XOR es muy sencilla de aplicar y es comunmente utilizada en malware para cifrar cadenas de texto, operaciones a realizar u otras cosas susceptibles a ser reconocidas por analistas y/o antivirus.

## Referencias
* https://en.wikipedia.org/wiki/XOR_cipher