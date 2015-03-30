<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es"><head>
<title><?=$title?></title>

<meta charset="UTF-8">

<link type="image/x-icon" href="/img/US.gif" rel="shortcut icon"/>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/main_styles.css">
<link href="/datepicker/jquery-ui.css" rel="stylesheet">

<script src="/datepicker/external/jquery/jquery.js"></script>
<script src="/datepicker/jquery-ui.js"></script>
<script src="/chart/Chart.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>


</head>
<body>
<?
include("functions.php");
session_start();

$conn = mysqli_connect("db560723553.db.1and1.com", "dbo560723553", "h0spital", "db560723553");
mysqli_set_charset($conn, "utf8");
// Check connection
if (mysqli_connect_errno()){
  echo "Imposible conectar: " . mysqli_connect_error();
  }

if($title != "Acceso al portal" && !empty($_SESSION)){
  //echo "Bienvenido, " . ucfirst($_SESSION['nombre']);
  if($_SESSION['permisos'] == "root" && $title != "Panel de control"){
    ?>
    <div id="header">
      <p>Bienvenido <?=ucfirst($_SESSION['usuario'])?> -> <a href="/panel-de-control">Panel de control</a></p>
    </div>
    <?
  }
}
?>

