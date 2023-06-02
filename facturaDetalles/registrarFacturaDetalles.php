<?php
  ini_set("display_errors", 1);

  ini_set("display_startup_errors", 1);
  
  error_reporting(E_ALL);
if(isset($_POST["guardar"])){
    require_once("config.php");

    $config = new FacturasDetalle();

    $config->setFacturaId($_POST["facturaId"]);
    $config->setProductoId($_POST["productoId"]);
    $config->setCantidad($_POST["cantidad"]);
    $config->setPrecioVenta($_POST["precioVenta"]);

    $config->insertData();

    echo "<script> alert('Los datos fueron guardados exitosamente');document.location='../facturaDetalles/facturaDetalles.php'</script>"; 
}
?>