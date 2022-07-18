# Hashing V2

## Puntos
`20`

## Pista
None

## Flag
`bitup19{secreto19}`

## Adjuntos
None

## Deploy
None

## Descripcion
Obten la entrada correspondiente al valor hash "34e238202678c5c3554c89ff8309ab90". Ejemplo: bitup19{entrada_de_la_funcion_hash}

## Solucion
Se pide encontrar la entrada que, al aplicar un algoritmo X, genera un valor hash "34e238202678c5c3554c89ff8309ab90". Lo primero es averiguar que algoritmo se esta utilizando para generar el valor hash, lo segundo adivinar que entrada corresponde a ese valor hash utilizando dicho algoritmo. Para averiguar el algoritmo utilizado, podemos fijarnos en el valor hash resultante, en especial, la longitud de dicho valor nos puede dar información sobre que tipo de algoritmo se puede estar utilizando. Al parecer son 32 carácteres, si buscamos algoritmos utilizados en funciones hash que generen un resultado de 32 carácteres, el que más nos va a salir va a ser "Message-Digest Algorithm 5" aka MD5 (128 bits), también podemos utilizar la herramienta [**Hash-Identifier**](https://github.com/blackploit/hash-identifier) para ver con que tipo de hashes se puede corresponder. Una vez ya sabemos que algoritmo se ha utilizado, ahora debemos encontrar el valor de entrada, para ello la forma de encontrarlo es ir generando valores hash de diferentes entradas, hasta dar con una entrada cuyo valor hash sea igual al que buscamos, a esto se le suele llamar "Ataque de Fuerza de Bruta". Pero MD5 es un algoritmo cuyo tiempo de generación de valor hash es muy reducido, y hay algunas plataformas como [**Hashkiller**](https://hashkiller.co.uk/) que tienen bases de datos enormes de pares "Entrada:ValorHash" en las que, si le introducimos un valor hash, nos dice que entrada es la que lo ha generado (si existe en su base de datos). Este proceso también puede hacerse utilizando un diccionario de palabras grande y herramientas como Hashcat o JohnTheRipper. Si pegamos el hash en hashkiller, en la sección de MD5, nos devolverá la entrada que será la que utilizaremos en la flag.

## Notas
Cuando se realiza un ataque de fuerza bruta, lo que determina el éxito es la capacidad computacional de nuestra/s máquina/s, el diccionario que utilicemos así como el tipo de hash al que nos enfrentamos. La posición hacía cada vértice de ese triangulo de opciones, determinará la viabilidad y éxito del procedimiento. Los dos procedimientos más comunes para obtener el valor de entrada teniendo un valor hash son: en primer lugar, el que se ha comentado antes, es la de aprovechar estos servicios que almacenan pares de valor en plano:hash, es decir, tablas precomputadas, y por otro lado, utilizando Fuerza Bruta por medio de un diccionario (listado de palabras sobre las que aplicar la función hash) aunque, cabe destacar, que no siempre se necesita generar un diccionario para realizar este proceso, y en ocasiones, va a ser muy pesado manejar diccionarios grandes, por ello y porque, puede que en un diccionario grade exista mucha basura, se suelen utilizar [máscaras](https://hashcat.net/wiki/doku.php?id=mask_attack).

## Referencias
* https://es.wikipedia.org/wiki/MD5
* https://es.wikipedia.org/wiki/Colisi%C3%B3n_(hash)