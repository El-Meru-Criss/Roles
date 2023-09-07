function Ver_roles() {
    $.ajax({
        type: "POST",
        url: "controlador/Ver_permisos_roles.php",
        success:function(d) {
            
            $("#Ver_roles").html(d);
        }
      })
}
function crear_rol() {

    var datos = {
        "id_rol":$("#id_rol").val(),
        "nom_rol":$("#nom_rol").val(),
    }

    $.ajax({
        type: "POST",
        url: "controlador/crear_rol.php",
        data:datos,
        success:function(d) {
            alert("creado");
          document.getElementById("id_rol").value = "";
          document.getElementById("nom_rol");
          Ver_roles();
        }
      })
}
function editar_rol() {

    var datos = {
        "id_rol":$("#id_rol").val(),
        "nom_rol":$("#nom_rol").val(),
    }

    $.ajax({
        type: "POST",
        url: "controlador/editar_rol.php",
        data:datos,
        success:function(d) {
            alert("editado");
          document.getElementById("id_rol").value = "";
          document.getElementById("nom_rol");
          Ver_roles();
        }
      })
}