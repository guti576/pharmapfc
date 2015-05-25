<?
$conn = mysqli_connect("db560723553.db.1and1.com", "dbo560723553", "h0spital", "db560723553");
mysqli_set_charset($conn, "utf8");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

include("simple_html_dom.php");
include("slugify.php");

$url = "http://www.infonieve.es/estaciones-esqui/";
$html = file_get_html($url);
$index = 0;
foreach($html->find(".tablaboton") as $estacion){
  $urls = "none";
  $titles = "none";
  $index ++;
  $url = $estacion->href;
  //echo $cams->href . "</br>";
  $html_2 = file_get_html($url);
  foreach($html_2->find("#contenido .pad5_bot strong") as $block){
    $titles .= "," . $block->innertext;
    
  }
  
  foreach($html_2->find("#contenido .webcam") as $block){
    $urls .= "," . $block->src;
    
  }
  $urls = mysqli_real_escape_string($conn, $urls);
  $titles = mysqli_real_escape_string($conn, $titles);

 $sql = "UPDATE `estaciones` SET `webcams_titles` = '$titles', `webcams_urls` = '$urls' WHERE `id` LIKE '$index'";
 //echo $sql;die();
 mysqli_query($conn, $sql);
 echo $index . "</br>"; 
}

?>