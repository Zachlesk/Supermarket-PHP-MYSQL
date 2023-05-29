<?php

require_once("config.php");

$record = new Proveedores();

if (isset($_GET["id"]) && isset($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        $record -> setProveedorId($_GET["id"]);
        $record -> delete();
        echo "<script> alert('La categoria seleccionada ha sido borrado satisfactoriamente');document.location='proveedores.php'</script>";
    }
}

?>