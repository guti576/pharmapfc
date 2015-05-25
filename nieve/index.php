<?
include("header.php");
?>    <!-- Page Content -->
<div class="container">
<!-- Jumbotron Header -->
<header class="jumbotron hero-spacer">
    <h1>A Warm Welcome!</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
    <p><a class="btn btn-primary btn-large">Call to action!</a>
    </p>
</header>

<hr>

<!-- Title -->
<div class="row">
    <div class="col-lg-12">
        <h3>Latest Features</h3>
    </div>
</div>
<!-- /.row -->

<!-- Page Features -->
<div class="row text-center">
  <?
  $today = date("Y-m-d");
  $result = mysqli_query($conn, "SELECT * FROM `snow` WHERE `date` LIKE '$today'");
  if(mysqli_num_rows($result) == 0){
    include("admin_get_info.php");
  }
  while($estacion = mysqli_fetch_assoc($result)){
  ?>
    <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <img src="img/<?=$estacion['slug']?>.jpg" alt="">
            <div class="caption">
                <h3><?=$estacion['estacion']?></h3>
                <p>Km esquiables: <?=$estacion['km']?></p>
                <p>Pistas: <?=$estacion['pistas']?></p>
                <p>Remontes: <?=$estacion['remontes']?></p>
                <p>Espesor: <?=$estacion['espesor']?></p>
                <p><?=$estacion['estado']?></p>
                    <a href="/nieve/webcams.php?slug=<?=$estacion['slug']?>" class="btn btn-primary">Webcams</a> <a href="#" class="btn btn-default">+ Info</a>
                </p>
            </div>
        </div>
    </div>
<?
  }
?>

</div>
<?
include("footer.php");
?>

