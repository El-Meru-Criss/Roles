function Ver_permisos_roles() {
    $.ajax({
        type: "POST",
        url: "controlador/Ver_permisos_roles.php",
        success:function(d) {
            
            $("#Ver_permisos_roles").html(d);
        }
      })
}

function otorgar_permiso_roles() {

    var datos = {
        "rol":$("#rol").val(),
        "permiso":$("#permiso").val(),
    }

    $.ajax({
        type: "POST",
        url: "controlador/otorgar_permiso_roles.php",
        data:datos,
        success:function(d) {
            alert("Otorgado");
          document.getElementById("rol").value = "";
          document.getElementById("permiso").selectedIndex = 0;
          Ver_permisos_roles();
        }
      })
}

function denegar_permiso_roles() {

    var datos = {
        "rol":$("#rol").val(),
        "permiso":$("#permiso").val(),
    }

    $.ajax({
        type: "POST",
        url: "controlador/denegar_permiso_roles.php",
        data:datos,
        success:function(d) {
            alert("Denegado");
          document.getElementById("rol").value = "";
          document.getElementById("permiso").selectedIndex = 0;
          Ver_permisos_roles();
        }
      })
}