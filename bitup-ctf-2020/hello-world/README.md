# Hello World

## Puntos

`50`

## Pista

None

## Flag

`bitup20{un4_nu3v4_3d1cc10n_0nl1n3}`

## Adjuntos

None

## Deploy

None

## Descripcion

Bienvenidos a Bitup Alicante edicción 2020, con este reto iniciamos el CTF de este año, espero que os guste. Así que vamos a lo que interesa, ¿Podrás decodificar el siguiente mensaje?

```
Yml0dXAyMHt1bjRfbnUzdjRfM2QxY2MxMG5fMG5sMW4zfQ==
```

## Solucion

Se entrega en el reto lo que parece ser un mensaje codificado en base64, como se ha aplicado una codificación al mensaje, significa que podemos obtener el original realizando la transformación inversa que se ha aplicado, para ello podemos hacerlo de diferentes formas:

* En Linux utilizando el comando: `echo -n "Yml0dXAyMHt1bjRfbnUzdjRfM2QxY2MxMG5fMG5sMW4zfQ==" | base64 -d`
* En Windows utilizando el comando de powershell: `[System.Convert]::ToBase64String([System.Text.Encoding]::UTF8.GetBytes("Yml0dXAyMHt1bjRfbnUzdjRfM2QxY2MxMG5fMG5sMW4zfQ=="))`
* En Mac utilizando el comando: `echo -n "Yml0dXAyMHt1bjRfbnUzdjRfM2QxY2MxMG5fMG5sMW4zfQ==" | base64 -D`

## Referencias

* https://www.base64encode.org/
* https://es.wikipedia.org/wiki/Base64
