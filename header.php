<<<<<<< HEAD
<?
include("functions.php");
session_start();

if(empty($_SESSION) && $title != "Acceso al portal"){
  header('Location: /');
  die();
}
?>
=======
>>>>>>> 323e86d73e46e1f27b66e9d4b98228ea1c80cc23
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es"><head>
<title><?=$title?></title>

<meta charset="UTF-8">

<link type="image/x-icon" href="/img/US.gif" rel="shortcut icon"/>
<<<<<<< HEAD

<link rel="stylesheet" href="/css/main_styles2.css">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">

=======
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/main_styles.css">
>>>>>>> 323e86d73e46e1f27b66e9d4b98228ea1c80cc23
<link href="/datepicker/jquery-ui.css" rel="stylesheet">

<script src="/datepicker/external/jquery/jquery.js"></script>
<script src="/datepicker/jquery-ui.js"></script>
<script src="/chart/Chart.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<<<<<<< HEAD
<script src="/js/bootstrap.min.js"></script>
=======
>>>>>>> 323e86d73e46e1f27b66e9d4b98228ea1c80cc23


</head>
<body>
<?
<<<<<<< HEAD

$conn = mysqli_connect("db560723553.db.1and1.com", "dbo560723553", "h0spital", "db560723553");
//echo "<pre>";var_dump($conn);die();
=======
include("functions.php");
session_start();

$conn = mysqli_connect("db560723553.db.1and1.com", "dbo560723553", "h0spital", "db560723553");
>>>>>>> 323e86d73e46e1f27b66e9d4b98228ea1c80cc23
mysqli_set_charset($conn, "utf8");
// Check connection
if (mysqli_connect_errno()){
  echo "Imposible conectar: " . mysqli_connect_error();
  }

<<<<<<< HEAD
if($title != "Acceso al portal"){
    ?>
    <div id="header">
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Menú de <?=ucfirst($_SESSION['usuario'])?>
        <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-right">
          <?
          if($_SESSION['permisos'] == "root"){
          ?>
          <li><a href="/panel-de-control"><i class="fa fa-cogs">  Panel del Control</i></a></li>
          <li><a href="#"><i class="fa fa-cloud-upload"></i>  Subir fichero</a></li>
          <?}?>
          <li><a href="/form"><i class="fa fa-bar-chart"></i>  Inicio</a></li>
          <li><a href="/log-out"><i class="fa fa-sign-out"></i>  Cerrar sesión</a></li>
        </ul>
      </div>
    </div>
    <?
=======
if($title != "Acceso al portal" && !empty($_SESSION)){
  //echo "Bienvenido, " . ucfirst($_SESSION['nombre']);
  if($_SESSION['permisos'] == "root" && $title != "Panel de control"){
    ?>
    <div id="header">
      <p>Bienvenido <?=ucfirst($_SESSION['usuario'])?> -> <a href="/panel-de-control">Panel de control</a></p>
    </div>
    <?
  }
>>>>>>> 323e86d73e46e1f27b66e9d4b98228ea1c80cc23
}
?>

