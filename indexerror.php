<?
$title = "Acceso al portal";
include("header.php");
?>
<br /><br />

<div >
<table border="1" cellpadding="2" cellspacing="2" width="100%">
  <tbody>
    <tr>
      <td id="index-marco" ><big><span style="font-weight: bold;"><br />
<h1>ACCESO USUARIOS</h1><br />
      <br />
      </span></big></td>
    </tr>
  </tbody>
</table>
<form method="get" action="/comprueba.php">
  <div style="text-align: center;"> <br />
  <br />
  <br />
  <br />
  <br /><span style="font-weight: bold;">
  	<!-- FORMULARIOS USUARIO Y CLAVE -->
Usuario</span>&nbsp;&nbsp; <input name="nombre" type="text" /><br /><span style="font-weight: bold;">
Clave</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="clave" type="password" /><br /><span style="color: red; font-weight: bold; text-decoration: underline;">
Usuario o clave incorrectos</span>
<br />
<input value="Entrar" type="submit" /> </div> <!-- BOTON DEL FORMULARIO -->

<?
include("footer.php");
?>