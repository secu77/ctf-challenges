# Un Ciudadano Ejemplar

## Puntos

`100`

## Pista

None

## Flag

`bitup20{nunca_te_fies_de_las_apariencias}`

## Adjuntos

* [me.zip](files/me.zip) (MD5: dbf22f54c3638cb527f37e8453abb1c2)

## Deploy

None

## Descripcion

Conocí a una persona hace un tiempo, un hombre correcto, cuidadoso, amable, educado, bien vestido, en definitiva... impecable, pero... tenía una mala vibración, se que esconde algo malo, así que me colé en su casa, busqué en su ordenador, pero no encontré nada raro, tiene muchas canciones de rock, y pensaba que no encontraría nada pero entonces, en la papelera de reciclaje, descubrí un archivo, esta protegido con contraseña. No he conseguido descifrarlo, se que esconde algo, ¿puedes descubrir que es?

## Solucion

Se entrega en el reto un archivo zip protegido con contraseña. De la descripción extraemos una pista, que nos dice "tiene muchas canciones de rock", haciendo referencia al diccionario [rockyou.txt](https://github.com/praetorian-inc/Hob0Rules/blob/master/wordlists/rockyou.txt.gz). Para crackear el archivo, podemos utilizar la herramienta [john the ripper](https://github.com/openwall/john) de la siguiente forma:

1. Se obtienen los hashes de cada uno de los archivos contenidos dentro del ZIP, utilizando la herramienta zip2john:

```bash
./zip2john ./bitup20/challenges/un-ciudadano-ejemplar/files/me.zip > ./bitup20/challenges/un-ciudadano-ejemplar/files/me.hashes
```

2. Una vez se han obtenido los [hashes de los archivos](files/me.hashes), y teniendo a mano la wordlist a utilizar (en este caso la pista nos decía rockyou.txt) utilizamos john contra el archivo de hashes:

```bash
./john --wordlist=./Descargas/rockyou.txt ./bitup20/challenges/un-ciudadano-ejemplar/files/me.hashes
```

Tras unos minutos o segundos (dependiendo de las capacidades de tu máquina), te mostrará la contraseña con la que se ha cifrado el archivo zip, esta contraseña es "rabbit". Si la utilizamos podremos descomprimir los archivos y acceder a la flag del reto.


## Referencias

* https://github.com/praetorian-inc/Hob0Rules/blob/master/wordlists/rockyou.txt.gz
* https://github.com/openwall/john
