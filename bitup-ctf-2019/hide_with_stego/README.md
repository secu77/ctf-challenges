# Hide With Stego

## Puntos
`40`

## Pista
None

## Flag
`bitup19{Wh0_w0uld_d0ubt_0f_4_cut3_k1tt7?}`

## Adjuntos
* [Imagenes capturadas](files/cuidado_son_adorables.zip) (MD5: 0fa4d9a7b5dfc930a817709128e8e308)

## Deploy
None

## Descripcion
Señor! Interceptamos una contraseña proveniente de los atacantes, pero... esto no tiene sentido, ¿por qué se estan pasando imágenes de gatitos? ¿Se les ha ido completamente la cabeza? ¿O hay algo que no estamos viendo? Ah! la contraseña es "mimimiii".

## Solucion
Extraemos dos apuntes de interes de la descripcion del reto: "una contraseña" y "varias imagenes". Podemos intuir que los atacantes se estan pasando información de interés oculta en imágenes. Para ello, si buscamos que se puede utilizar para ocultar información en imágenes, nos saldrá una herramienta muy usada llamada "steghide", y que justo, precisa de una contraseña para insertar dicha información, así como para recuperarla. Procedemos a ello y extraemos con el comando `steghide extract -sf imagen.jpeg` (proporcionando como salvoconducto la contraseña que tenemos), de cada imagen, un txt con lo que parecen ser cadenas aleatorias de caracteres, pero... si nos fijamos en una de ellas, el '=' nos sugiere que es base64, por tanto, si combinamos las 3 en el orden adecuado, nos quedará como 'V2gwX3cwdWxkX2QwdWJ0XzBmXzRfY3V0M19rMXR0Nz8=' y al decodificar eso, nos sale la flag.

## Notas
Muchos malware ocultan información a la hora de exfiltrar en fotografías, documentos, etc; con el fin de evitar que se pueda trazar que información ha sido filtrada. También, podemos ver el uso de técnicas de esteganografía para trazabilidad de imágenes o incluso como marca de agua no visible.

## Referencias
* https://securityaffairs.co/wordpress/38978/cyber-crime/apt-29-report.html