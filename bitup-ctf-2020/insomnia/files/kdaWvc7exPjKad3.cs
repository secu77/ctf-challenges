$flag = "MW1/IXwfKTsNE38+eBM5fDU3fH48OTglLg=="

function bnazQOguvTwnyhnsaG
{param (
[Parameter(Position = 0 ,          Mandatory = $true)] [string] $AYwXleghUrnrBn,
                    [Parameter(Position = 1 ,          Mandatory = $true)] [byte] $Ycizf
)

                    $ikEMTJKdXdRCKikvQru = [System.Convert]::FromBase64String( $AYwXleghUrnrBn )

                    for ( 
$QNV = 0; $QNV -lt                   $ikEMTJKdXdRCKikvQru.length;                             $QNV++ )
                    {
                                        $ikEMTJKdXdRCKikvQru[$QNV] = $ikEMTJKdXdRCKikvQru[$QNV] -bxor $Ycizf
}

                    return  [System.Text.Encoding]::ASCII.GetString( 
                        $ikEMTJKdXdRCKikvQru 
)
                                }

Function                                     xbhbjdhwaoaklkxa
{
    param
(
    [parameter(Position = 0 ,                      Mandatory = $true)]            [string[]] $HJdnkaHagFAg
    )

    Process
{
        ForEach ($kdIAmd in $HJdnkaHagFAg) {
            ([regex]::Matches($kdIAmd,'.',$(bnazQOguvTwnyhnsaG "blVbVEhoU3BZWkg=" 0x3c))         | ForEach {$_.value}) -join ''
}
          }
    }

Function                  dkmlkdawhjgveinocewn {
param
    (
        [parameter(Position = 0                              ,  Mandatory = $true)] [string[]] $xajkndwapg      )

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

if ( $jkcdewCcewkjK -eq $flag ) {Write-Output "[*] The flag: '$input' is correct :)"
}else
{Write-Output "[!] The flag: '$input' is not correct :("
                            }