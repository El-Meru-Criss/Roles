// ADMINISTRAR PERMISOS A ROLES ----------------INICIO-------------------------------

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

// ADMINISTRAR PERMISOS A ROLES ----------------FIN-------------------------------

// ADMINISTRAR PERMISOS A USUARIOS ----------------INICIO-------------------------------


function Ver_permisos_usuarios() {
    $.ajax({
        type: "POST",
        url: "controlador/Ver_permisos_usuarios.php",
        success:function(d) {
            
            $("#Ver_permisos_usuarios").html(d);
        }
      })
}

function otorgar_permiso_usuarios() {

    var datos = {
        "usuario":$("#usuario").val(),
        "permiso":$("#permiso").val(),
    }

    $.ajax({
        type: "POST",
        url: "controlador/otorgar_permiso_usuarios.php",
        data:datos,
        success:function(d) {
            alert("Otorgado");
          document.getElementById("usuario").value = "";
          document.getElementById("permiso").selectedIndex = 0;
          Ver_permisos_usuarios();
        }
      })
}

function denegar_permiso_usuarios() {

    var datos = {
        "usuario":$("#usuario").val(),
        "permiso":$("#permiso").val(),
    }

    $.ajax({
        type: "POST",
        url: "controlador/denegar_permiso_usuarios.php",
        data:datos,
        success:function(d) {
            alert("Denegado");
          document.getElementById("usuario").value = "";
          document.getElementById("permiso").selectedIndex = 0;
          Ver_permisos_usuarios();
        }
      })
}


// ADMINISTRAR PERMISOS A USUARIOS ----------------FIN-------------------------------

// General

function select_permisos() {
  $.ajax({
    type: "POST",
    url: "controlador/select_permisos.php",
    success:function(d) {
        
        $("#select_permisos").html(d);
    }
  })
}