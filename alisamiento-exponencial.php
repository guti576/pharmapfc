<?
$title = "Alisamiento exponencial";
include("header.php");

$inicio = $_GET['inicio']; //yyyy-mm-dd
$fin = $_GET['fin'];
$farmaco = urldecode($_GET['farmaco']);

$days = strtotime($fin) - strtotime($inicio);
$days = $days / 86400;

$sql = "SELECT * FROM `registro` WHERE `nombre` LIKE '$farmaco' AND `fecha` <= '$fin' AND `fecha` >= '$inicio' ";
//echo $sql;die();
$result = mysqli_query($conn, $sql);
//echo mysqli_affected_rows($conn);
$pronosticos = array();
$consumos = [200,230,260,180,270,240,250,300,320,350,240,210];
array_push($pronosticos, $consumos[0]);
$alpha = 0.5;
echo "\nalpha = " . $alpha . "\n";

?>
<table border="1">
  <tr>
    <td>Periodo</td>
    <td>Consumo</td>
    <td>Pronóstico</td>
  </tr>
  <tr>
    <td>0</td>
    <td><?=$consumos[0]?></td>
    <td><?=$pronosticos[0]?></td>
  </tr>
<?
for($i = 1; $i < count($consumos); $i ++){
  $pronosticos[$i] = $consumos[$i-1] * $alpha + (1 - $alpha) * $pronosticos[$i-1];
  ?>
  <tr>
    <td><?=$i?></td>
    <td><?=$consumos[$i]?></td>
    <td><?=$pronosticos[$i]?></td>
  </tr>
  <?}?>
</table>
<?
//echo "<pre>"; print_r($pronosticos);
?>