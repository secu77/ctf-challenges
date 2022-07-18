# Magic Words

## Puntos
`50`

## Pista
None

## Flag
`bitup19{n3v3r_l0st_th3_h34d}`

## Adjuntos
* [Archivo sin cabecera](files/beast) (MD5: a57b894ff720133a287df1abe2d8ab8f)

## Deploy
None

## Descripcion
Por suerte pudimos arrancárselo de sus garras, pero... con el forcejeo, alguien perdió la cabeza. Sin esos bytes me temo que no sabremos que tipo de archivo era. Esa bestia no paraba de mirarlo, no le quitaba ojo de encima, estamos seguros que no eran simples datos, estamos seguro que tenía un significado muy especial.

## Solucion
Obtenemos un archivo adjunto al reto, parecen simples datos, sin ningun tipo de extensión y formato. El reto nos cuenta que se perdieron los primeros bytes, que corresponden a la cabecera del archivo, los cuales indican el tipo de fichero que es, pero como no sabemos cual es, tendremos que fuzzear el magic number para sacarlo. Nos dan otra pista adiccional, y es que "no paraba de mirarlo", lo que puede sugerir a que se trata de una imagen, por tanto ahí reducimos el número de magic numbers. Con los comandos `echo -n -e 'codigo_en_hexadecimal' > header` y `cat header archivo_sin_cabecera > archivo_con_cabecera.extension` creamos una cabecera y luego concatenamos la cabecera y el archivo (solo con cuerpo) en uno final que ya tiene cabecera y cuerpo.

Si llegamos a probar con el magic number de JPG ("FF D8 FF E0 00 10 4A 46 49 46 00 01") podemos conseguir la imagen original y leer la flag con los siguientes comandos: `echo -n -e '\xff\xd8\xff\xe0\x00\x10\x4a\x46\x49\x46\x00\x01' > crazyheader` (generamos la cabecera JPG), luego `file crazyheader` (verificamos que la cabecera es correcta) y finalmente `cat crazyheader beast > beast.jpg` (juntamos cabecera y cuerpo en un archivo).

## Notas
No es extraño encontrarse alguna vez malware que viene sin cabecera y que, simplemente, parecen datos sin ningun tipo de información adicional. De hecho, hay varias técnicas de evasión que consisten en que un programa A (que actua como loader o cargador) contiene en su propio codigo a un programa B (que contiene el codigo malicioso en cuestion o las instrucciones objetivo a ejecutar), entonces, lo que se ejecuta es el programa A, que a su vez, cuando se ejecuta, en memoria, carga el programa B. La particularidad de ese "programa B" incrustado dentro del A, es que este puede estar cifrado, dividido o sin cabecera, lo que dificulta el análisis a los motores de antivirus, pues, tu no puedes ejecutar un EXE (por ejemplo) sin su cabecera (que indica que es un EXE), pero si puedes incrustar el programa sin cabecera en el codigo de tu programa A y, en memoria, añadirle la cabecera antes de cargarlo (este proceso no es facil, pero es algo que se viene utilizando bastante). Entonces, algo que hacen muchos antivirus es: si encuentran algo que puede encajar con un programa incrustado en un archivo, si este tiene la cabecera de un EXE o similar (buscando por el MZ), lo analizar como tal, pero... si no tiene cabecera, lo que hacen algunos es intentar reconstruirla, porque, si al ponerle una cabecera, y simplemente le faltaba eso, ya lo tiene completo de nuevo (No es un tecnica fiable, pero a veces acierta, ante medidas simples de ofuscación).

## Referencias
  * https://en.wikipedia.org/wiki/List_of_file_signatures