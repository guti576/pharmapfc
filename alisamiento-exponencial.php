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
$alpha = 0.1;
while($alpha <= 1){
$pronosticos = array();
$errors = array();
$consumos = [200,230,260,180,270,240,250,300,320,350,240,210];
array_push($pronosticos, $consumos[0]);
//$alpha = 0.5;
echo "\nalpha = " . $alpha . "\n";

?>
<table border="1">
  <tr>
    <td>Periodo</td>
    <td>Consumo</td>
    <td>Pronóstico</td>
    <td>Error</td>
  </tr>
  <tr>
    <td>0</td>
    <td><?=$consumos[0]?></td>
    <td><?=$pronosticos[0]?></td>
    <td><?=abs($pronosticos[0] - $consumos[0])?></td>
  </tr>
<?
array_push($errors, abs($pronosticos[0] - $consumos[0]));

for($i = 1; $i < count($consumos); $i ++){
  $pronosticos[$i] = $consumos[$i-1] * $alpha + (1 - $alpha) * $pronosticos[$i-1];
  ?>
  <tr>
    <td><?=$i?></td>
    <td><?=$consumos[$i]?></td>
    <td><?=$pronosticos[$i]?></td>
    <td><?=abs($pronosticos[$i] - $consumos[$i])?></td>
  </tr>
  <?
  array_push($errors, abs($pronosticos[$i] - $consumos[$i]));
  }
  ?>
</table>
<?
$average = array_sum($errors) / count($errors);
$alpha = $alpha + 0.1;
echo "error medio: " . $average;
echo "<br><br><br>";
}
//echo "<pre>"; print_r($pronosticos);
?>