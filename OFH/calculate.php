<?
$title = "formulario";
include("../header.php");
//yyyy-mm-dd
$fin = date("Y-m-d"); //hoy
$inicio = date("Y-m-d", time() - 2419200);//2419200 segundos = 4 semanas;

?>

<div class="col-md-12">
  <div id="columnchart_material"></div>
</div>


<?
include("footer.php");
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

google.load("visualization", "1.1", {packages:["bar"]});
google.setOnLoadCallback(drawChart);
      function drawChart() {
        $.ajax({
          url: "./launch-c",
          dataType: "json",
          success: function (jsonData) {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Fecha');
            data.addColumn('number', 'Pedido');
            data.addColumn('number', 'Óptimo');
            

            for (var i = 0; i < jsonData.length; i++) {
              data.addRow([jsonData[i].fecha, jsonData[i].pedido, jsonData[i].optimo]);
            }

            var options = {
              chart: {
                title: 'Pedido a Realizar',
                subtitle: 'Sales, Expenses, and Profit: 2014-2017',
              }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, options);
          }
        });
      }
</script>