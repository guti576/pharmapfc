<?
include('header.php');

<<<<<<< HEAD
for($i = 0; $i <= 6000; $i++){
=======
for($i = 0; $i <= 5000; $i++){
>>>>>>> 323e86d73e46e1f27b66e9d4b98228ea1c80cc23
  $fecha= rand(strtotime("2010-01-01"),strtotime("now"));
  $nombre = "farmaco " . rand(1, 10);
  $cantidad = rand(300, 700);
  //echo date("d-M-Y", $fecha);
  echo "<br/>";
<<<<<<< HEAD
  $sql = "INSERT INTO `registro` (`nombre`, `fecha`, `cantidad`) VALUES ('$nombre', '".date("Y-m-d", $fecha)."', '$cantidad') ON DUPLICATE KEY UPDATE `cantidad` = '$cantidad'";
=======
  $sql = "INSERT INTO `registro` (`nombre`, `fecha`, `cantidad`) VALUES ('$nombre', '".date("Y-m-d", $fecha)."', '$cantidad')  ON DUPLICATE KEY UPDATE `cantidad` = '$cantidad'";
>>>>>>> 323e86d73e46e1f27b66e9d4b98228ea1c80cc23
  echo mysqli_query($conn, $sql);
}

?>