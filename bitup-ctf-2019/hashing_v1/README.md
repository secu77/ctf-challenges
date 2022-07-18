# Hashing V1

## Puntos
`10`

## Pista
None

## Flag
`bitup19{4b73227876a85c38f875b12ffdb1deb375c98666}`

## Adjuntos
None

## Deploy
None

## Descripcion
Aplica la función hash a la contraseña "bitup, por y para estudiantes", y utiliza ese valor hash resultante de 40 carácteres como flag. Ejemplo: bitup19{resultado_funcion_hash}

## Solucion
Se pide aplicar una función hash sobre la cadena "bitup, por y para estudiantes". El reto no nos da el nombre del algoritmo a utilizar en la función hash, pero si nos da una pista del valor hash resultante, y es la longitud, pues dice son 40 carácteres. Si buscamos un poquito en google, podemos encontrar que el algoritmo de "Secure Hash Algorithm" aka SHA genera un valor reducido de 40 caracteres. Para generarlo, podemos utilizar el comando en Linux: `echo -n "bitup, por y para estudiantes" | sha1sum` que le pasa esa cadena al comando **sha1sum** que aplicará dicho algoritmo a la cadena y nos devolverá el valor hash que utilizaremos como flag. También podemos utilizar la herramienta online [**Hashkiller**](https://hashkiller.co.uk/Tools/HashPassword).

## Notas
Las funciones hash generan una "firma" o "valor hash" a partir de una determinada entrada, siendo el valor resultante y el valor origen diferentes entre si e imposible de obtener uno de los dos sin conocer el otro. Las funciones hash, suelen utilizarse para almacenar contraseñas en base de datos, sin necesidad de guardar dicho valor en plano (pues cualquiera que tuviera acceso a la base de datos podría ver todas esas contraseñas sin ningún tipo de problema, y recordamos que las contraseñas son información sensible que hay que proteger). De esta forma, cuando un usuario se registra en una aplicación, generamos un valor hash utilizando como entrada la contraseña que nos proporciona, y guardamos este valor hash en la base de datos, así, cuando un usuario procede a iniciar sesión y nos
introduce una contraseña, el procedimiento que realizaremos será generar un valor hash de esa contraseña que nos introduce, buscar el valor hash de dicho usuario en base de datos y compararlos. En caso de que sean iguales, la contraseña es correcta, y en caso negativo, no lo es. Y así evitamos guardar las contraseñas en claro en base de datos, y en caso de que alguien accediera a nuestra base de datos, tendría que utilizar un listado de contraseñas (diccionario) e ir generando los valores hashes y comparándolos con el que hay en base de datos (tarea nada facil dependiendo del algoritmo que se utilice en la función hash).

## Referencias
* https://es.wikipedia.org/wiki/Secure_Hash_Algorithm
* https://es.wikipedia.org/wiki/Funci%C3%B3n_hash
* https://latam.kaspersky.com/blog/que-es-un-hash-y-como-funciona/2806/