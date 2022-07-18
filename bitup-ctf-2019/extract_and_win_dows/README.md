# Extract And Win Dows

## Puntos
`80`

## Pista
None

## Flag
`bitup19{traidor}`

## Adjuntos
* [Backup_SAM_SYSTEM](files/backups.zip) (MD5: aa8cf386b3fc8f8bae2f849e4ab9ed47)

## Deploy
None

## Descripcion
Nuestro compañero Roman, no recuerda la contraseña, pero por suerte alguien, sin malas intenciones, le hizo un backup del SYSTEM y la SAM. Ais... roman roman, ¿quién te podrá ayudar?  P.D: la flag es la contraseña del usuario Roman.

## Solucion
Se entrega un archivo comprimido que contiene un backup de la SAM y el SYSTEM de un Sistema Windows, se nos pide recuperar la contraseña del usuario Roman. Una de las formas de hacerlo, es utilizando el fantástico programa [mimikatz](https://github.com/gentilkiwi/mimikatz/) de Gentilkiwi que, especificándole la ruta del SYSTEM y la SAM. Entonces, situamos el [ejecutable de Mimikatz](https://github.com/gentilkiwi/mimikatz/releases) en una carpeta junto con la SAM.hiv y el SYSTEM.hiv y corremos mimikatz desde una cmd, una vez lo ejecutamos y nos sale la prompt de mimikatz, ponemos el comando: `lsadump::sam /system:system.hiv /sam:sam.hiv` y a continuación nos deberá arrojar información que ha extraido de estos, entre ellos, el hash NTLM del usuario Roman. Si cogemos ese hash y nos dirigimos a https://hashkiller.co.uk/Cracker/NTLM , podremos crackear el hash, obteniendo la contraseña en plano que será la flag del reto. Otras opciones a mimikatz son "samdump2", "pwdump", "secretsdump", etc.

## Notas
El fichero sam.hiv es un backup de la "Base de Datos de un sistema Windows que contiene los hashes NTLM de los Usuarios de dicho sistema" (SAM), pero dicha base de datos, que esta montada en HKLM, se encuentra bloqueada, y sólo podemos acceder a ella (en modo lectura) teniendo privilegios de Sistema (SYSTEM).

## Referencias
* https://en.wikipedia.org/wiki/Security_Account_Manager
* https://es.wikipedia.org/wiki/Registro_de_Windows#HKEY_LOCAL_MACHINE_(HKLM)