<?
include("header.php");
?>    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer" background="../img/bg.jpg">
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
          $result = mysqli_query($conn, "SELECT * FROM `snow`");
          while($estacion = mysqli_fetch_assoc($result)){
          ?>
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../img/<?=$estacion['slug']?>.jpg" alt="">
                    <div class="caption">
                        <h3><?=$estacion['estacion']?></h3>
                        <p>Km esquiables: <?=$estacion['km']?></p>
                        <p>Pistas: <?=$estacion['pistas']?></p>
                        <p>Remontes: <?=$estacion['remontes']?></p>
                        <p>Espesor: <?=$estacion['espesor']?></p>
                        <p>
                            <a href="#" class="btn btn-primary"><?=$estacion['estado']?></a> <a href="#" class="btn btn-default">+ Info</a>
                        </p>
                    </div>
                </div>
            </div>
        <?
          }
        ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
