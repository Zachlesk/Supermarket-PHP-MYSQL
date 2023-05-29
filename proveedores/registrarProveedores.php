<?php

if (isset($_POST['guardar'])) {
    require_once("config.php");

    $config = new Proveedores();

    $config-> setNombre($_POST['nombre']);
    $config-> setTelefono($_POST['telefono']);
    $config-> setCiudad($_POST['ciudad']);

    $config-> insertData();

    echo "<script> alert('La categoria fue guardada satisfactoriamente');document.location='proveedores.php'</script>";
}

?>