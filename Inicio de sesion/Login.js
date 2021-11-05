
function comprobarnom(){
    if (document.getElementById('NombredeUsuario') == null
    || document.getElementById('NombredeUsuario') == "") {
    alert("Escriba un nombre de usuario");
    document.getElementById('NombredeUsuario').focus();
    return false;
}
return true;
}
/*function comprobarpass(){
if (document.getElementById('Contraseña') == null
|| document.getElementById('Contraseña') == "") {
alert("Escriba una contraseña");
document.getElementById('Contraseña').focus();
return false;
}
return true;
}*/