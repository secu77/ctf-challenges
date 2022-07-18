# Simple Anal

## Puntos
`90`

## Pista
None

## Flag
`bitup19{80f421c5fd5b28fc05b485de4f7896a1}`

## Adjuntos
* [Descargas](files/anal_me.zip) (MD5: 3b11402594c5fea20b7dd96789c9aaee)

## Deploy
None

## Descripcion
El otro día a un colega se le metió un virus en el ordenador, y vaya la que le lió. Pero no me fio de que pueda quedarle algún otro en el ordenador. El problema es que tiene tanta mierda que mirarlo a mano puede ser agotador, te adjunto todos los archivos que tiene por si se te ocurre alguna forma de automatizarlo. P.D: da con el bicho (conocido) y utiliza su hash MD5 como flag.

## Solucion
Del fichero adjunto del reto, obtenemos un conjunto de archivos: imagenes, videos, audios, documentos ofirmatico y ejecutables. Es importante que nos centremos en aquellos que puedan ser ejecutados: PE y scripts. Si es cierto que se puede embeber malware dentro de imagenes y otro documentos, al igual que se pueden meter macros en documentos ofirmaticos y demás, pero... en este caso es mucho más facil. 

Tenemos una serie de archivos, la vía más rápida y facil de comprobar si alguno es un malware "conocido" es extraer la firma de dicho archivo (valor hash MD5 o SHA1) y preguntar a servicios como VirusTotal (necesitamos api key), si tiene alguna coincidencia en su base de datos. Para ello elaboramos un simple script en python como [este](files/test.py) y le consultamos a la api de virus total por cada uno de los archivos de los que sospechamos.

Tras un rato (pues virus total no te deja hacer mas de 4 request seguidas), encontramos que el ejecutable "jre" es en realidad el Mimikatz.exe, y utilizaremos su hash MD5 como flag.

## Notas
Puede que la idea de este reto sea un tanto confusa e imprecisa, pues se pensó como algo facil, pero... analizandolo bien, me he dado cuenta que hay muchos "pero's" en el procedimiento. Pero de ahí la confianza generada, que actuará en contra cuando el participante se enfrente al reto de "Ahora me ves" donde, comparte con este el mismo objetivo, pero ya no habrá virustotal que valga sino ingenio y creatividad.

## Referencias
None