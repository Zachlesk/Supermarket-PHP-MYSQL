<?php

require_once("config.php");

$record = new Config();

if (isset($_GET["id"]) && isset($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        $record -> setId($_GET["id"]);
        $record -> delete();
        echo "<script> alert('La categoria seleccionada ha sido borrado satisfactoriamente');document.location='facturacion.php'</script>";
    }
}

?>