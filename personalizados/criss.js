function Ver_permisos_roles() {
    $.ajax({
        type: "POST",
        url: "controlador/mostrar.php",
        success:function(d) {
            
            $("#Ver_permisos_roles").html(d);
        }
      })
}