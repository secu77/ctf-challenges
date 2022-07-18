# Insomnia

## Puntos

* Puntuación Máxima `200`
* Puntuación Mínima `100`
* Decadencia `10`

## Pista

None

## Flag

`bitup20{y0u_4r3_AweS0m3!}`

## Adjuntos

* [evil.zip](files/evil.zip) (MD5: 7310128c0b0d858ca133b5dc05ebcaea)

## Deploy

None

## Descripcion

Se ha encontrado un código "malicioso" en uno de los Endpoints. Creo que si lo analizas bien... descubrirás la flag del reto.

## Solucion

De la descripción del reto, nos dan un archivo zip que contiene un archivo `kdaWvc7exPjKad3.cs`. Podemos ver que el código esta ofuscado, para desofuscarlo y hacernos con la flag se seguirán los siguientes pasos:

1. Se identa un poco el codigo y se clarifica, identificamos que es un código Powershell y no Csharp, quedando algo así:

```powershell
$flag = "MW1/IXwfKTsNE38+eBM5fDU3fH48OTglLg=="

function bnazQOguvTwnyhnsaG
{
    param
    (
        [Parameter(Position = 0 ,  Mandatory = $true)] [string] $AYwXleghUrnrBn,
        [Parameter(Position = 1 ,  Mandatory = $true)] [byte] $Ycizf
    )

    $ikEMTJKdXdRCKikvQru = [System.Convert]::FromBase64String( $AYwXleghUrnrBn )

    for ( $QNV = 0; $QNV -lt $ikEMTJKdXdRCKikvQru.length; $QNV++ )
    {
        $ikEMTJKdXdRCKikvQru[$QNV] = $ikEMTJKdXdRCKikvQru[$QNV] -bxor $Ycizf
    }

    return  [System.Text.Encoding]::ASCII.GetString( $ikEMTJKdXdRCKikvQru )
}

Function xbhbjdhwaoaklkxa
{
    param
    (
        [parameter(Position = 0 ,  Mandatory = $true)] [string[]] $HJdnkaHagFAg
    )

    Process
    {
        ForEach ($kdIAmd in $HJdnkaHagFAg)
        {
            ([regex]::Matches($kdIAmd,'.',$(bnazQOguvTwnyhnsaG "blVbVEhoU3BZWkg=" 0x3c)) | ForEach {$_.value}) -join ''
        }
    }
}

Function dkmlkdawhjgveinocewn 
{
    param
    (
        [parameter(Position = 0 ,  Mandatory = $true)] [string[]] $xajkndwapg
    )
    $nvkjdnwew = [System.Text.Encoding]::ASCII.GetBytes($xajkndwapg)
    $mmckwlewf =[Convert]::ToBase64String($nvkjdnwew)
    return $mmckwlewf
}

Function xnlknreniqoiiwqonodaw 
{
    param
    (
        [parameter(Position = 0 ,  Mandatory = $true)] [string[]] $mvlkmlslkq
    )
    $jknkjdsoiew = [System.Text.Encoding]::ASCII.GetString([System.Convert]::FromBase64String($mvlkmlslkq))
    return $jknkjdsoiew
}

$input = Read-Host -Prompt 'Input your flag: '
$mlkxmalmvewwcew = $(bnazQOguvTwnyhnsaG "blVbVEhoU3BZWkg=" 0x3c)
$mlkxmalmvewwcew = dkmlkdawhjgveinocewn $input                      
$cdwcewjnvore = bnazQOguvTwnyhnsaG $mlkxmalmvewwcew 0x4c
$jkcdewCcewkjK = xbhbjdhwaoaklkxa "blVbVEhoU3BZWkg="
$vreooirjo3jfoi4nfeno3oi34ofn = xbhbjdhwaoaklkxa $cdwcewjnvore
$jkcdewCcewkjK = dkmlkdawhjgveinocewn $vreooirjo3jfoi4nfeno3oi34ofn

if ( $jkcdewCcewkjK -eq $flag ) 
{
    Write-Output "[*] The flag: '$input' is correct :)"
}
else
{
    Write-Output "[!] The flag: '$input' is not correct :("
}
```

2. Si analizamos las funciones podemos darnos cuenta de que hace cada una, y transformando un poco el código queda algo más sencillo de leer:

```powershell
$flag = "MW1/IXwfKTsNE38+eBM5fDU3fH48OTglLg=="

# Funcion que cifra un string utilizando operaciones XOR y una key
function xor_crypt
{
    param
    (
        [Parameter(Position = 0 ,  Mandatory = $true)] [string] $strb64,
        [Parameter(Position = 1 ,  Mandatory = $true)] [byte] $key
    )

    $str = [System.Convert]::FromBase64String($strb64)

    for ( $i = 0; $i -lt $str.length; $i++ )
    {
        $str[$i] = $str[$i] -bxor $key
    }

    return [System.Text.Encoding]::ASCII.GetString($str)
}

# Funcion que le da la vuelta a un string, de derecha a izquierda
Function reverse_string
{
    param
    (
        [parameter(Position = 0 ,  Mandatory = $true)] [string[]] $str
    )

    Process
    {
        ForEach ($char in $str)
        {
            ([regex]::Matches($char,'.','RightToLeft') | ForEach {$_.value}) -join ''
        }
    }
}

# Funcion que codifica un string en base64
Function base64_encode 
{
    param
    (
        [parameter(Position = 0 ,  Mandatory = $true)] [string[]] $str
    )
    $strBytes = [System.Text.Encoding]::ASCII.GetBytes($str)
    $strb64 = [Convert]::ToBase64String($strBytes)
    return $strb64
}

# Funcion que decodifica un string en base64
Function base64_decode 
{
    param
    (
        [parameter(Position = 0 ,  Mandatory = $true)] [string[]] $strb64
    )
    $str = [System.Text.Encoding]::ASCII.GetString([System.Convert]::FromBase64String($strb64))
    return $str
}


$input = Read-Host -Prompt 'Input your flag: '
$base64_input = base64_encode $input                      
$crypt_input = xor_crypt $base64_input 0x4c
$crypt_input_reversed = reverse_string $crypt_input
$crypt_input_reversed_b64 = base64_encode $crypt_input_reversed

if ( $crypt_input_reversed_b64 -eq $flag ) 
{
    Write-Output "[*] The flag: '$input' is correct :)"
}
else
{
    Write-Output "[!] The flag: '$input' is not correct :("
}
```

3. Analizando el flujo por el que pasa nuestro input hasta que es comparado con la flag, podemos advertir que pasos seguir para descifrar la flag:
    1. Decodificar del Base64
    2. Darle la vuelta a la cadena
    3. Convertir a Base64
    4. (Des)Cifrar con XOR

```powershell
$c = base64_decode $flag     # decode base64
$d = reverse_string $c       # reverso
$e = base64_encode $d        # a base64
$f = xor_crypt $e 0x4c       # a xor
$f
```

4. Y, si ejecutamos esa porción de código anterior, podremos obtener la flag en plano: `bitup20{y0u_4r3_AweS0m3!}`

## Referencias

None
