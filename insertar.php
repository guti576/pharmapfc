<?
include("header.php");

$salida = explode("/", $_GET['salida']);
$salida = $salida[2] ."-". $salida[0] ."-". $salida[1];

$llegada = explode("/", $_GET['llegada']);
$llegada = $llegada[2] ."-". $llegada[0] ."-". $llegada[1];


$sql = "INSERT INTO `registro`(`nombre`, `cantidad`, `salida`, `entrada`, `month`, `year`) VALUES ('".$_GET['farmaco']."', '".intval($_GET['cantidad'])."', '$salida','$llegada', '".date("n", strtotime($_GET['salida']))."', '".date("Y", strtotime($_GET['salida']))."')";
mysqli_query($conn, $sql);

//echo $sql; die();
echo "nombre: " . $_GET['farmaco'] . "</br>";

echo "cantidad: " . intval($_GET['cantidad']) . "</br>";

echo "salida: " . $_GET['salida'] . "</br>";
//yyyy-mm-dd
echo "llegada: " . $_GET['llegada'];

include("footer.php");
  
?>