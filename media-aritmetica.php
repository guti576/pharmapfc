<?
$title = "Media aritmética";
include("header.php");

$inicio = $_GET['inicio']; //yyyy-mm-dd
$fin = $_GET['fin'];
$farmaco = urldecode($_GET['farmaco']);

$days = strtotime($fin) - strtotime($inicio);
$days = $days / 86400;

<<<<<<< HEAD
$sql = "SELECT cantidad, fecha FROM `registro` WHERE `nombre` LIKE '$farmaco' AND `fecha` <= '$fin' AND `fecha` >= '$inicio' ";
//echo $sql;die();
$result = mysqli_query($conn, $sql);
=======
$sql = "SELECT * FROM `registro` WHERE `nombre` LIKE '$farmaco' AND `fecha` <= '$fin' AND `fecha` >= '$inicio' ";
//echo $sql;die();
$result = mysqli_query($conn, $sql);
//echo mysqli_affected_rows($conn);
>>>>>>> 323e86d73e46e1f27b66e9d4b98228ea1c80cc23
$sum = 0;
while($data = mysqli_fetch_assoc($result)){
  $sum += $data['cantidad'];
  echo $data['cantidad'] . "<br>";
}

$media = $sum / mysqli_affected_rows($conn);
echo "media: " . $media;
?>