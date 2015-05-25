<?
include("simple_html_dom.php");
include("slugify.php");

$conn = mysqli_connect("db560723553.db.1and1.com", "dbo560723553", "h0spital", "db560723553");
mysqli_set_charset($conn, "utf8");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$url = "http://www.infonieve.es/parte-de-nieve/";
//$url = "http://www.infonieve.es/estaciones-esqui/pais/espana/1/";
$html = file_get_html($url);

//foreach($html->find('#contenido tr td[title="Parte de Nieve de la Estación de Esquí de Candanch&uacute;"] a') as $block){
  $index = 0;
  $index_estado = 0;
  //while($block = $html->find('#contenido td:nth-child(3) a strong')){
  foreach($html->find('#contenido td:nth-child(3) a strong') as $block){
    if($index == 0){
      $estado = $html->find('.tablaestadomin', $index_estado)->innertext;
      if($estado == "A")
        $estado = "Abierta";
      if($estado == "C")
        $estado = "Cerrada";
      if($estado == "PA")
        $estado = "Próxima Apertura";
      $index_estado ++;
      echo "Estacion:  " . $block->innertext;
      $estacion = $block->innertext;
      $index++;
    }elseif($index == 1){
      echo "Remontes abiertos:  " . $block->innertext;
      $remontes = intval($block->innertext);
      $index++;
    }elseif($index == 2){
      echo "Pistas abiertas:  " . $block->innertext;
      $pistas = intval($block->innertext);
      $index++;
    }elseif($index == 3){
      echo "Kilometros:  " . $block->innertext . "Km";
      $km = intval($block->innertext);
      $index++;
    }elseif($index == 4){
      echo "Espesor de nieve:  " . $block->innertext . "cm";
      $espesor = $block->innertext;
      $index = 0;
      $sql = "INSERT INTO `snow`(`estacion`, `remontes`, `pistas`, `km`, `espesor`, `estado`, `date`, `slug`) VALUES ('$estacion', '$remontes', '$pistas', '$km', '$espesor', '$estado', '".date("Y/m/d")."', '".makeSlug($estacion)."')";
      //echo $sql;die();
      $result = mysqli_query($conn, $sql);
    }

  echo "\n\n\n";
}









?>
