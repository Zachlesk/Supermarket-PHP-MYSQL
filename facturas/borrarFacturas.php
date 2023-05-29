<?php
require_once("config.php");

$record = new Facturas();

if (isset($_GET["proveedorId"]) && isset($_GET["req"])) {
    if (isset($_GET["req"]) == "delete") {
        $record -> setFacturaId($_GET["facturaId"]);
        $record -> delete();
        echo "
        <script> alert('Los datos fueron borrados Exitosamente');
        document.location='facturas.php'
        </script>";
    }
}
?>