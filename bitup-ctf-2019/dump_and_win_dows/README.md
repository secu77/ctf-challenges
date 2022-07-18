# Dump and Win Dows

## Puntos
`100`

## Pista
None

## Flag
`bitup19{m4t4su3n0s}`

## Adjuntos
* [Dump_LSASS](files/lsass_dump.zip) (MD5: 482c6bcf7f215460f8ade92bf1411c51)

## Deploy
None

## Descripcion
Conseguimos llegar al endpoint, pero... para infiltrarnos en su sistema, necesitamos conocer su contraseña, nos percatamos que había una sesión interactiva del objetivo, así que hicimos un dump del lsass. Bueno, y ahora te dejamos darle el toque de gracia, mata al "Pato" de una vez por todas.

## Solucion
Se entrega un archivo que resulta ser un dump del proceso lsass.exe de un sistema Windows. Se pide extraer las credenciales de dicho dump, para ello, utilizaremos Mimikatz al que, pasándole el lsass.DMP, nos extraerá dichas credenciales que estaban "guardadas en la memoria del proceso". Situamos el [ejecutable de Mimikatz](https://github.com/gentilkiwi/mimikatz/releases) en una carpeta junto con el lsass.DMP y corremos mimikatz desde una cmd, una vez lo ejecutamos y nos sale la prompt de mimikatz, ponemos el comando: `sekurlsa::minidump lsass.DMP` tras cargar el lsass, ponemos el comando `sekurlsa::logonpasswords` y a continuación nos deberá arrojar información que ha extraido del proceso. En dicha información encontramos la contraseña en claro del usuario Pato, que utilizaremos como flag.

## Notas
None

## Referencias
* https://ired.team/offensive-security/credential-access-and-credential-dumping/dumping-lsass-passwords-without-mimikatz-minidumpwritedump-av-signature-bypass