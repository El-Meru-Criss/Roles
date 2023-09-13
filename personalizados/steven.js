function Ver_roles() {
    $.ajax({
        type: "POST",
        url: "controlador/mostrar.php",
        success:function(d) {
            
            $("#Ver_roles").html(d);
        }
      })
}
function mostrar_permisos() {
  $.ajax({
      type: "POST",
      url: "controlador/Ver_permisos.php",
      success:function(d) {
          
          $("#mostrar_permisos").html(d);
      }
    })
}
//funciones utilizadas en crear y editar roles
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
//funciones utilizadas en crear y editar permisos
function crear_permiso() {

  var datos = {
      "id_permiso":$("#id_permiso").val(),
      "nom_per":$("#nom_per").val(),
  }

  $.ajax({
      type: "POST",
      url: "controlador/crear_permiso.php",
      data:datos,
      success:function(d) {
          alert("creado");
        document.getElementById("id_permiso").value = "";
        document.getElementById("nom_per");
        Ver_roles();
      }
    })
}
function editar_permiso() {

  var datos = {
      "id_permiso":$("#id_permiso").val(),
      "nom_per":$("#nom_per").val(),
  }

  $.ajax({
      type: "POST",
      url: "controlador/editar_permiso.php",
      data:datos,
      success:function(d) {
          alert("editado");
        document.getElementById("id_permiso").value = "";
        document.getElementById("nom_per");
        Ver_roles();
      }
    })
}