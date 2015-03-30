<?
$title = "formulario";
include("header.php");
//yyyy-mm-dd
$fin = date("Y-m-d"); //hoy
$inicio = date("Y-m-d", time() - 2419200);//2419200 segundos = 4 semanas;

?>
<script>
  $(function() {
    var departure = $('#departure-date').datepicker().val();
    var arrival = $( "#arrival-date" ).datepicker().val();
  });
</script>
<script type="text/javascript">
  function form(){
    //alert($("#departure-date").val());
    if($("#departure-date").val() != "" && $("#arrival-date").val() != "") {
      $("#formulario").submit();
    } else {
      alert("Salida o llegada incompletos");
  }
}
</script>
<form id="form-registro" id="formulario" action="/insertar" method="get">
<h3>Insertar datos</h3>
<p>Fármaco: <select id="farmaco" name="farmaco">
                <option value="farmaco 1" selected="selected">Fármaco 1</option>
                <option value="farmaco 2">Fármaco 2</option>
                <option value="farmaco 3">Fármaco 3</option>
                <option value="farmaco 4">Fármaco 4</option>
                <option value="farmaco 5">Fármaco 5</option>
                <option value="farmaco 6">Fármaco 6</option>
            </select></p>
<p>Precio: <input type="text" name="precio" /></p>
<p>Cantidad: <input type="number" name="cantidad"></p>
<p>Salida: <input type="text" id="departure-date" name="salida"></p>
<p>Llegada: <input type="text" id="arrival-date" name="llegada"></p>
<input type="submit" value="Enviar" onclick="form(); return false;">
<input type="reset" value="Borrar">
</form>

<form id="form-consulta" method="post" action="/google-graph" target="_blank">
<h3>Histórico de datos</h3>
<p>Fármaco: <select name="farmaco_graf">
              <option value="farmaco 1" selected="selected">Fármaco 1</option>
              <option value="farmaco 2">Fármaco 2</option>
              <option value="farmaco 3">Fármaco 3</option>
              <option value="farmaco 4">Fármaco 4</option>
              <option value="farmaco 5">Fármaco 5</option>
              <option value="farmaco 6">Fármaco 6</option>
              </select></p>
<p>Fecha inicio: <input type="date" name="inicio" /></p>
<p>Fecha fin: <input type="date" name="fin" /></p>
<input type="submit" value="Mostrar" />
</form>
<div id="chart_div"></div>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
$(document).ready(function() {
  $("#farmaco").change(function(){
    console.log("change");
    drawChartarea();
  });

});

google.load("visualization", "1.1", {packages:["corechart"]});
google.setOnLoadCallback(drawChartarea);
function drawChartarea() {
  $.ajax({
    type: "POST",
    url: "/grafica",
    data: { inicio: '<?=$inicio?>', fin: '<?=$fin?>', farmaco_graf: $('#farmaco').val()}
    })
    .done(function( data ) {
          //console.log("ajax: " + JSON.parse(data));
          maindata = JSON.parse(data); // now maindata es un array
          //console.log("maindata: " + maindata);
          table = [['Fecha', 'Consumo']]; //funciona
          maindata.forEach(function(entry) {
              entry = JSON.parse(entry);
              entry = [entry[0], parseInt(entry[1])];
              table.push(entry);
          });
          console.log( "table: " + table );

          var dataarea = google.visualization.arrayToDataTable(table);
          var optionsarea = {
            colors: ['red'],
            title: 'Consumo del ' + $('#farmaco').val(),
            hAxis: {title: 'Fecha',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
          };

          var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
          chart.draw(dataarea, optionsarea);
    });
}
</script>

<?
include("footer.php");
?>