# Grep harder

## Puntos
`20`

## Pista
None

## Flag
`bitup19{d1rty4ndn0ts3cur3flag}`

## Adjuntos
* [Archivo compilado](files/main) (MD5: bae261b139ddc181a8d0a9ad416453ae)

## Deploy
None

## Descripcion
Hardcodear la "flag" no es una buena práctica. Ahora verás por qué. Solo tienes que buscar y filtrar. Ya sabes con que filtrar y si te ves perdido... GREP HARDER!

## Solucion
La descripción del reto nos dice que la flag esta hardcodeada en el fichero adjunto. Por tanto, la solución base para esto, es utilizar el comando `strings` para leer todas las cadenas que contenga dicho archivo y, mirando un poco más, vemos que flag, aparece entrecomillado, puede sugerirnos a que filtremos por flag para dar con la misma. Si combinamos la busqueda con el filtrado con el comando `strings main | grep "flag"` (o si somos mas zorros, con 'bitup19{' ya es directo) obtenemos la flag troll (que se ve de lejos) y la correcta.

## Notas
A veces las cadenas de texto hardcodeadas en un archivo nos da bastante información de lo que hace el archivo y, en ocasiones, los antivirus obtienen los strings característicos de muestras de malware clasificadas, firman dichos strings y así, cuando escanean un ejecutable o programa nuevo, extraen las cadenas de texto que firmarán y comprobarán contra una base de datos de firmas que tienen. Si por ejemplo un malware famoso se escribe en una ruta concreta o crea una clave concreta en el registro, si alguien sigue el mismo procedimiento, puede pillarle porque comparten mismas firmas.

## Referencias
None