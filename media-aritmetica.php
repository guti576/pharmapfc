<?
$title = "Media aritmética";
include("header.php");

$inicio = $_GET['inicio']; //yyyy-mm-dd
$fin = $_GET['fin'];
$farmaco = urldecode($_GET['farmaco']);

$days = strtotime($fin) - strtotime($inicio);
$days = $days / 86400;

$sql = "SELECT cantidad, fecha FROM `registro` WHERE `nombre` LIKE '$farmaco' AND `fecha` <= '$fin' AND `fecha` >= '$inicio' ";
//echo $sql;die();
$result = mysqli_query($conn, $sql);
$sum = 0;
while($data = mysqli_fetch_assoc($result)){
  $sum += $data['cantidad'];
  echo $data['cantidad'] . "<br>";
}

$media = $sum / mysqli_affected_rows($conn);
echo "media: " . $media;
?>