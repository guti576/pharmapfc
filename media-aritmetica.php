<?
$title = "Media aritmética";
include("header.php");

$inicio = $_GET['inicio']; //yyyy-mm-dd
$fin = $_GET['fin'];
$farmaco = urldecode($_GET['farmaco']);

//Fichero donde escribiremos
$file = 'OFH/datos2.pha';
//Abrimos el fichero
$contenido = file_get_contents($file);
//Borramos el fichero
$contenido = "";

$days = strtotime($fin) - strtotime($inicio);
$days = $days / 86400;

$sql = "SELECT cantidad, fecha FROM `registro` WHERE `nombre` LIKE '$farmaco' AND `fecha` <= '$fin' AND `fecha` >= '$inicio' ";
//echo $sql;die();
$result = mysqli_query($conn, $sql);
$sum = 0;
while($data = mysqli_fetch_assoc($result)){
  $sum += $data['cantidad'];
  echo $data['cantidad'] . "<br>";
  $contenido .= $data['cantidad'] . "\n";
}

$media = $sum / mysqli_affected_rows($conn);
echo "media: " . round($media);

for($i= 40-mysqli_affected_rows($conn); $i>0; $i--){
  $contenido .= round($media) . "\n";
}

// Escribir en el fichero
file_put_contents($file, trim($contenido, "\n"));

?>