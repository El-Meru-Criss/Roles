function validarformularioIn()
{
    //validacion
    
    var txtnomI = document.getElementById('txtusuarioLogin').value;
    var txtclaI = document.getElementById('txtclaveLogin').value;
    var txtexit = document.getElementById('txtiniexit').value;
    

    if (txtnomI == "") { alert("por favor digite el nombre de usuario"); document.getElementById('txtusuarioLogin').focus(); return false; };
    if (txtclaI == "") { alert("por favor digite una clave"); document.getElementById('txtclaveLogin').focus(); return false; };
    if (txtexit == "") { alert("Este usuario no existe "); document.getElementById('txtiniexit').focus(); return false; };
    
    return true;
}