<?
$conn = mysqli_connect("db560723553.db.1and1.com", "dbo560723553", "h0spital", "db560723553");
mysqli_set_charset($conn, "utf8");
// Check connection
if (mysqli_connect_errno()){
  echo "Imposible conectar: " . mysqli_connect_error();
}

$form = $_GET['form'];
if($form == 1){
  $sql = "INSERT INTO `usuarios`(`user`, `password`, `permisos`) VALUES ('".$_GET['nombre']."', '".$_GET['clave']."', '".$_GET['permisos']."')";
  mysqli_query($conn, $sql);
}elseif($form == 2){
  $sql = "DELETE FROM `usuarios` WHERE user = '".$_GET['nombre']."' AND permisos = '".$_GET['permisos']."'";
  mysqli_query($conn, $sql);
  
}elseif($form == 3){
  $sql = "INSERT INTO `farmacos`(`nombre`, `coste_almacenamiento`, `retraso_pedido`, `minimo_uds`, `maximo_uds`, `incremento_uds`) VALUES ('".$_GET['nombre']."', '".$_GET['coste_almacenamiento']."', '".$_GET['retraso_pedido']."', '".$_GET['minimo_uds']."', '".$_GET['maximo_uds']."', '".$_GET['incremento_uds']."')";
  mysqli_query($conn, $sql);
  
}else{
  $sql = "DELETE FROM `farmacos` WHERE nombre = '".$_GET['nombre']."' AND hospital = '".$_GET['hospital']."'";
  mysqli_query($conn, $sql);
}

header('Location: /panel-de-control');
?>