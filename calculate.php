<?
$title = "formulario";
include("header.php");
//yyyy-mm-dd
$fin = date("Y-m-d"); //hoy
$inicio = date("Y-m-d", time() - 2419200);//2419200 segundos = 4 semanas;

?>

<select id="estimador">
  <option value="">Ninguno</option>
  <option value="lineal">Lineal</option>
  <option value="alisamiento">Alisamiento Exponencial</option>
</select>
<input type="button" value="Calcular" id="calculate"/>
<div class="col-md-12">
  <div id="columnchart_material"></div>
</div>


<?
include("footer.php");
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

$(document).ready(function() {
  
  $('#estimador').change(function(){
    var estimador = $('#estimador').val();
    console.log("change: " + estimador);
  })
  
  
  
  $("#calculate").click(function(){
    var estimador = $('#estimador').val();
    console.log("calculate: " + estimador);
    drawChart();
  });
});

google.load("visualization", "1.1", {packages:["bar"]});
//google.setOnLoadCallback(drawChart);
      function drawChart() {
        $.ajax({
          url: "OFH/launch-c",
          dataType: "json",
          success: function (jsonData) {
            if(jsonData.status == "OK"){
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'Fecha');
              data.addColumn('number', 'Pedido');
              data.addColumn('number', 'Óptimo');
            

              for (var i = 0; i < jsonData.data.length; i++) {
                data.addRow([jsonData.data[i].fecha, jsonData.data[i].pedido, jsonData.data[i].optimo]);
              }

              var options = {
                chart: {
                  title: 'Pedido a Realizar',
                  subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                }
              };

              var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
              chart.draw(data, options);
            }else{
              console.log("status: " + jsonData.status);
            }
          }
        });
      }
</script>