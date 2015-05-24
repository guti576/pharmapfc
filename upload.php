<?php
include_once("header.php");

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "El archivo ". basename( $_FILES["fileToUpload"]["name"]). " fue cargado con éxito.";
} else {
    echo "Error al subir el fichero.";
}

$fichero = fopen($target_file, "r") or die("Imposible abrir el fichero!");
echo"<br>";
if ($fichero) {
    while (($line = fgets($fichero)) !== false) {
      $line = explode("\t", $line); //separar por tabulacion
      $date = date("Y-m-d", strtotime($line[0]));
      echo "fecha: " . $line[0] . " consumo: " . -intval($line[1]) . "<br>";
    }
    fclose($fichero);
} else {
    // error opening the file.
}

?>