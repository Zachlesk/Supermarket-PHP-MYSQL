<?php

if(isset($_POST["guardar"])){
    require_once("config.php");

    $config = new Facturas();

    $config->setFacturaId($_POST["facturaId"]);
    $config->setProductoId($_POST["productoId"]);
    $config->setCantidad($_POST["cantidad"]);
    $config->setPrecioVenta($_POST["precioVenta"]);

    $config->insertData();

    echo "<script> document.location='../facturas/facturas.php'</script>"; 
}
?>