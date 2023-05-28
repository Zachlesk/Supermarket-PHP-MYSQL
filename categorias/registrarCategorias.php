<?php

if (isset($_POST['guardar'])) {
    require_once("config.php");

    $config = new Config();

    $config-> setNombre($_POST['nombre']);
    $config-> setDescripcion($_POST['descripcion']);
    $config-> setImagen($_POST['imagen']);

    $config-> insertData();

    echo "<script> alert('La categoria fue guardada satisfactoriamente');document.location='facturacion.php'</script>";
}

?>