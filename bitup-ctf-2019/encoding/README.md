# Encoding

## Puntos
`10`

## Pista
None

## Flag
`bitup19{YmluYXJ5IHJ1bGVz}`

## Adjuntos
None

## Deploy
None

## Descripcion
Pasa la cadena "binary rules" a base 64 y utiliza el valor resultante como flag. Ejemplo: bitup19{texto_en_otra_base}

## Solucion
Podemos utilizar el siguiente comando en linux: `echo -n "binary rules" | base64` o utilizando la página [Base64encode](https://www.base64encode.org/).

## Notas
Pasar determinada información a otras bases (como base64), es una practica habitual y muy común. En algunos casos es necesario utilizar una codificación que no pueda romper una comunicación o que pueda ser interpretada por el propio protocolo que se esta utilizando y llegar a darse condiciones no esperadas que puedan ser perjudiciales. Un ejemplo puede ser la transmisión de información mediante peticiones HTTP: si queremos pasar información en la URL (Ex: https://bitupalicante.com/?data=datosenplanosincodificar) y, dicha información, contiene el carácter '&', al hacer la petición, este carácteres se va a tomar como un separador de campos y no como un simple caracter que forma parte de los datos correspondientes al campo "data". Ejemplo: si enviamos la cadena "Michael&Company", quedaría como: https://bitupalicante.com/?data=Michael&Company, pero esta petición no tendría un solo campo, "data", como esperamos, sino que tendría 2, "data" y "Company", pues dicho caracter sería interpretado como separador o concatenador de campos, siempre y cuando no sea escapado o codificado. Esta razón es una de las muchas otras que existen para codificar la información, y base64 es una opción muy popular.

## Referencias
* https://es.wikipedia.org/wiki/Notaci%C3%B3n_posicional
* https://es.wikipedia.org/wiki/Base64