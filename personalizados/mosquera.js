function Ver_libros() {
    $.ajax({
        type: "POST",
        url: "controlador/Ver_libros.php",
        success:function(d) {
            
            $("#Ver_libros").html(d);
        }
      })
}
function crear_libro() {

    var datos = {
        "nom_libro":$("#nom_libro").val(),
    }

    $.ajax({
        type: "POST",
        url: "controlador/crear_libro.php",
        data:datos,
        success:function(d) {
            alert("creado");
          document.getElementById("id_libro").
          document.getElementById("nom_libro");
          Ver_libros();
        }
      })
}
function editar_libro() {

    var datos = {
        "id_libro":$("#id_libro").val(),
        "nom_libro":$("#nom_libro").val(),
    }

    $.ajax({
        type: "POST",
        url: "controlador/editar_libro.php",
        data:datos,
        success:function(d) {
            alert("editado");
          document.getElementById("id_libro").value = "";
          document.getElementById("nom_libro");
          Ver_libros();
        }
      })
}