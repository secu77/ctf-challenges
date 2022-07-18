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



$Text = "bitup20{y0u_4r3_AweS0m3!}"
#$Text
$EncodedText = dkmlkdawhjgveinocewn $Text  # a base64
#$EncodedText
$a = bnazQOguvTwnyhnsaG $EncodedText 0x4c  # a xor
#$a
$b = xbhbjdhwaoaklkxa $a                   # reverso
#$b
$c = dkmlkdawhjgveinocewn $b               # a base64
#$c

$c
$d = xnlknreniqoiiwqonodaw $c              # decode base64
$d
$e = xbhbjdhwaoaklkxa $d                   # reverso
$e
$f = dkmlkdawhjgveinocewn $e               # a base64
$f
$g = bnazQOguvTwnyhnsaG $f 0x4c            # a xor
$g