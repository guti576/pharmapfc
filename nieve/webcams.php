<?
$title = "webcams";
include("header.php");

$sql = "SELECT * FROM `estaciones` WHERE `slug` LIKE '".$_GET['slug']."'";
$result = mysqli_query($conn, $sql);
$estacion = mysqli_fetch_assoc($result);
$webcams_urls = str_replace("none,", "", $estacion['webcams_urls']);
$webcams_titles = str_replace("none,", "", $estacion['webcams_titles']);
$webcams_urls = explode(",", $webcams_urls);
$webcams_titles = explode(",", $webcams_titles);

?>
<!-- Page Content -->
<div class="container">
<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Page Heading
            <small>Secondary Text</small>
        </h1>
    </div>
</div>
<!-- /.row -->
<!-- Projects Row -->
<div class="row">
    <?
    $index = 0;
    foreach($webcams_urls as $webcam){
    ?>
    <div class="col-md-4 portfolio-item">
        <a href="#">
            <img class="img-responsive" src="<?=$webcams_urls[$index]?>" alt="">
        </a>
        <h3>
            <a href="#"><?=$webcams_titles[$index]?></a>
        </h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
    </div>
    <?
    $index ++;
    }
    ?>
</div>
<?
include("footer.php");
?>

