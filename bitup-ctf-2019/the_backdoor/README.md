# The Backdoor

## Puntos
`60`

## Pista
None

## Flag
`bitup19{n0_v4l3_c0n_l1mp14r_s0l0_l4_m13rd4_qu3_s3_v3}`

## Adjuntos
* [Backup Wordpress](files/wordpress_bak.zip) (MD5: a7c33adcf5990386e4a64ed8f5684d62)

## Deploy
None

## Descripcion
No sabemos muy bien como ha pasado, pero... entraron, hasta el servidor y, por suerte, conseguimos frenarlos a tiempo, pero... ¿sabes esa sensación que uno tiene de no sentirse seguro? Y eso es por lo que te contacto, creo que se dejaron una puerta trasera y, en poco tiempo, volverán a entrar. Necesito que analices mi plataforma y que los encuentres, porque... yo se que estan ahí y no se irán hasta acabar lo que empezaron.

## Solucion
Descargamos lo que parece ser un backup de un Wordpress del fichero adjunto del reto. El reto nos dice que "ellos" entraron, y llegaron hasta el servidor, lo que significa que llegaron a tener ejecución en el Servidor y eso puede haber pasado de dos formas (principalmente): 

1. Explotando algun tipo de vulnerabilidad en algun plugin o tema
2. O subiendo un archivo que nos permita ejecutar comandos en el servidor (aka webshell). 

En el primer caso, no se deja rastro de ningun archivo (en principio), pero es dificil encontrar un plugin que te de Ejecución Remota de Codigo sin estar autenticado (aka RCE preauth), y con lo que tenemos no lo vamos a ver, por tanto, vamos a revisar la segunda opción, para ello nos dirigimos a uploads (donde vemos varios archivos), y ... lo que no pinta nada bien aquí, es un archivo PHP que, si analizamos su contenido, veremos que esta ofuscado y que contiene un base64 `Yml0dXAxOXtuMF92NGwzX2Mwbl9sMW1wMTRyXw==` que es parte de la flag. 

Vale, tenemos al primero, para pillar al segundo tendremos que fijarnos bien en las fechas, y nos daremos cuenta que la de este archivo que hemos encontrado es ligeramente antigua a los demás archivos, pero sin ser tan antigua como los ficheros de wordpress. Ahí esta la clave del asunto, si buscamos archivos PHP modificados en esa fecha, daremos con 1 (wp-cron.php), y curiosamente es del core. Si lo analizamos, veremos que también tiene una pequeña puerta trasera que permite ejecución de comandos y que, finalmente, contiene otro base64 `czBsMF9sNF9tMTNyZDRfcXUzX3MzX3YzfQ==` que es la segunda parte de la flag.

## Notas
None

## Referencias
None