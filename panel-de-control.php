<?
$title = "Panel de control";
include("header.php");
?>
<h1 style="color: red">Panel de Control de <?echo ucfirst($_SESSION['usuario'])?></h1>
<form id="nuevo-usuario" method="get" action="/admin-panel-control">
  <p>Añadir usuario</p>
  <input type="text" name="nombre" placeholder="nombre">
  <input type="text" name="clave" placeholder="clave">
  <select name="permisos">
    <option value="reina_sofia">Reina Sofía</option>
    <option value="san_juan">San Juan de Dios</option>
    <option value="root">Administrador</option>
  </select>
  <input type="hidden" name="form"value="1" />
  <input type="submit" value="Añadir" />
</form>
<form id="eliminar-usuario" method="get" action="/admin-panel-control">
  <p>Eliminar usuario</p>
  <input type="text" name="nombre" placeholder="nombre">
  <select name="permisos">
    <option value="reina_sofia">Reina Sofía</option>
    <option value="san_juan">San Juan de Dios</option>
    <option value="root">Administrador</option>
  </select>
  <input type="hidden" name="form"value="2" />
  <input type="submit" value="Eliminar" />
</form>
<form id="nuevo-farmaco" method="get" action="/admin-panel-control">
  <p>Añadir fármaco</p>
  <input type="text" name="nombre" placeholder="nombre">
  <input type="number" name="coste_almacenamiento" placeholder="coste almacenamiento">
  <input type="number" name="retraso_pedido" placeholder="retraso pedido">
  <input type="number" name="minimo_uds" placeholder="minimo">
  <input type="number" name="maximo_uds" placeholder="máximo">
  <input type="number" name="incremento_uds" placeholder="incremento">
  <select name="hospital">
    <option value="reina_sofia">Reina Sofía</option>
    <option value="san_juan">San Juan de Dios</option>
  </select>
  <input type="hidden" name="form"value="3" />
  <input type="submit" value="Añadir" />
</form>
<form id="eliminar-farmaco" method="get" action="/admin-panel-control">
  <p>Eliminar fármaco</p>
  <input type="text" name="nombre" placeholder="nombre">
  <select>
    <option value="reina_sofia">Reina Sofía</option>
    <option value="san_juan">San Juan de Dios</option>
  </select>
  <input type="hidden" name="form"value="4" />
  <input type="submit" value="Eliminar" />
</form>
<?
include("footer.php");
?>