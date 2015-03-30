<?
$conn = mysqli_connect("db560723553.db.1and1.com", "dbo560723553", "h0spital", "db560723553");
mysqli_set_charset($conn, "utf8");
// Check connection
if (mysqli_connect_errno()){
  echo "Imposible conectar: " . mysqli_connect_error();
}
  
$inicio = $_POST['inicio']; //yyyy-mm-dd
$fin = $_POST['fin'];
$farmaco = urldecode($_POST['farmaco_graf']);

$days = strtotime($fin) - strtotime($inicio);
$days = $days / 86400;

$sql = "SELECT * FROM `registro` WHERE `nombre` LIKE '$farmaco' AND `fecha` <= '$fin' AND `fecha` >= '$inicio' ";
//echo $sql;die();
$result = mysqli_query($conn, $sql);
//echo mysqli_affected_rows($conn);
$index = 0;
$response = array();
//$bar = "['Fecha', 'Stock']";
//array_push($response, $bar);

while($block = mysqli_fetch_assoc($result)){

  if($index == 0){
    $calendar = '[ new Date('.str_replace("-", ", ", $block['fecha']).'), '.$block['cantidad'].' ]';
    $bar = json_encode(array($block['fecha'],$block['cantidad']));
    array_push($response, $bar);
  }else{
    $calendar .= ', [ new Date('.str_replace("-", ", ", $block['fecha']).'), '.$block['cantidad'].' ]';
    $bar = json_encode(array($block['fecha'],$block['cantidad']));
    array_push($response, $bar);
  }
  $index++;
}
echo json_encode($response);
?>