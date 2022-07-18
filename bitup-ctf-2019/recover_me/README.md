# Recover Me

## Puntos
`70`

## Pista
None

## Flag
`bitup19{l0_qu3_h4y_qu3_v3r}`

## Adjuntos
* [Clonado_USB](files/black.zip) (MD5: d48d874a8e6defc8c290e966f0544a0f)

## Deploy
None

## Descripcion
Se ha incautado un USB que ha sido formateado. El detenido es un peligroso perteneciente de una banda criminal muy sofisticada y peligrosa. Tienen miembros repartidos por toda España. Se busca un documento muy importante sobre la financiación de algunos de los cabecillas de la banda. Confiamos en que pueda recuperar alguna información interesante, le adjuntamos la copia del dispositivo. Gracias.

## Solucion
Se entrega un comprimido adjunto en el reto, dicho comprimido contiene una copia exacta de un usb. Si utilizamos la herramienta foremost, extraeremos varios archivos que habían sido borrados, simplemente con el comando `foremost black.data` empezará a extraer la información. Entre ellos, dentro de los restos (xml) de lo que parecía ser un xlsx encontraremos la flag.

## Notas
Siempre que quieras eliminar cualquier información de un dispositivo, hazlo, y pon todo a ceros. Recuerda `dd if=/dev/zero of=/dev/sdX status=progress` te puede salvar de que conozcan tus secretos más oscuros.

## Referencias
None