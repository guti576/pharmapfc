<?
$title = "Gráficas";
include("header.php");

$inicio = $_POST['inicio']; //yyyy-mm-dd
$fin = $_POST['fin'];
$farmaco = urldecode($_POST['farmaco_graf']);

//CONSUMO DEL FARMACO EN EL PERIODO SELECCIONADO
$sql = "SELECT fecha, cantidad as data FROM `registro` WHERE `nombre` LIKE '$farmaco' AND `fecha` <= '$fin' AND `fecha` >= '$inicio' ";
$result = mysqli_query($conn, $sql);

$datos = array();
while($block = mysqli_fetch_assoc($result)){
  array_push($datos, $block);
}
$datos = json_encode($datos);

//DATOS TOTALES DISPONIBLES EN BASE DE DATOS
$sql = "SELECT fecha, cantidad as data FROM `registro` WHERE `nombre` LIKE '$farmaco'";
$result = mysqli_query($conn, $sql);
$datos_total = array();
while($block = mysqli_fetch_assoc($result)){
  $sum += $block['data']; 
  array_push($datos_total, $block);
}
$media = $sum / count($datos_total);
$datos_total = json_encode($datos_total);

if(mysqli_num_rows($result) == 0){
  ?><p align="middle">No existen datos en la fecha seleccionada para <?=$farmaco?> </p><?
  include("footer.php");
  die();
}

?>
<div class="col-md-12">
  <div id="marco">
    <h2>Histórico de Consumo</h2>
  </div>
</div>

<div class="col-md-3">
  <div id="table_div"></div>
</div>
<div class="col-md-9">
  <div id="calendar_basic"></div>
</div>


<div class="col-md-12">
  <div id="marco">
    <h2>Estimadores</h2>
  </div>
  <div id="linechart" style="margin: 0 auto"></div>
</div>

<?

include("footer.php");
?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["calendar", "table", "line"]});
      google.setOnLoadCallback(drawChart);
      google.setOnLoadCallback(drawTable);
      google.setOnLoadCallback(drawLine);
      
      function drawTable() {
              var jsonData = <?echo json_encode($datos)?>;
              jsonData = JSON.parse(jsonData);
              var data = new google.visualization.DataTable();
              data.addColumn('date', 'Fecha');
              data.addColumn('number', 'Consumo');
              for (var i = 0; i < jsonData.length; i++) {
                data.addRow([new Date(jsonData[i].fecha), parseInt(jsonData[i].data)]);
              }
              var table = new google.visualization.Table(document.getElementById('table_div'));

              table.draw(data, {showRowNumber: true});
            }
     function drawChart() {
         var jsonData = <?echo json_encode($datos_total)?>;
         jsonData = JSON.parse(jsonData);
         var dataTable = new google.visualization.DataTable();
         dataTable.addColumn({ type: 'date', id: 'Date' });
         dataTable.addColumn({ type: 'number', id: 'Won/Loss' });
         for (var i = 0; i < jsonData.length; i++) {
           dataTable.addRow([new Date(jsonData[i].fecha), parseInt(jsonData[i].data)]);
         }

         var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));

         var options = {
           height: 200,
         };

         chart.draw(dataTable, options);
     }
     function drawLine() {

           var data = new google.visualization.DataTable();
           var jsonData = <?echo json_encode($datos)?>;
           var media = <?echo $media?>;
           jsonData = JSON.parse(jsonData);
           data.addColumn('date', 'Fecha');
           data.addColumn('number', 'Consumo');
           data.addColumn('number', 'Promedio');

           for (var i = 0; i < jsonData.length; i++) {
             data.addRow([new Date(jsonData[i].fecha), parseInt(jsonData[i].data), media]);
           }

           var options = {
             chart: {
               title: 'Estimación por media artimética',
               subtitle: 'Valor promedio: ' + media
             },
             height: 300
           };

           var chart = new google.charts.Line(document.getElementById('linechart'));

           chart.draw(data, options);
         }
</script>