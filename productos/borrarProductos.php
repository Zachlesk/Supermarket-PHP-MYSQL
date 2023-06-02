<?php

require_once("config.php");

$record = new Productos();

if (isset($_GET["id"]) && isset($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        $record -> setProductoId($_GET["id"]);
        $record -> delete();
        echo "<script> alert('El producto seleccionado ha sido borrado satisfactoriamente');document.location='productos.php'</script>";
    }
}

?>