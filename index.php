<?
$title = "Acceso al portal";
include("header.php");
?>
<h1 id="index-marco">ACCESO USUARIOS</h1>
<div id="acceso" style="text-align: center;">
    <p>Usuario</p>
    <input id="usuario" name="nombre" type="text" />
    <p>Clave</p>
    <input id="clave" name="clave" type="password"/><br />
    <input value="Entrar" id="entrar" type="submit" />
<<<<<<< HEAD
    <div id="error"></div>
=======
>>>>>>> 323e86d73e46e1f27b66e9d4b98228ea1c80cc23
</div>
<script>
$(document).ready(function() {
    $("#entrar").click(function(){
      if($("#usuario").val() != "" && $("#clave").val() != "") {
          $.post("/comprueba", {nombre: $("#usuario").val(), clave: $("#clave").val()})
            .done(function( data ) {
              if(data == "OK"){
                window.location = "/form";
              }else if(data == "NOK"){
<<<<<<< HEAD
                $('#error').html('<p style="color: red" >Usuario o clave incorrectos</p>')
=======
                $('#formulario').append('<p style="color: red" >Usuario o clave incorrectos</p>')
>>>>>>> 323e86d73e46e1f27b66e9d4b98228ea1c80cc23
              }
              });
      } else {
        return false;
      }
    });
});
</script>
 <?
 include("footer.php");
 ?>