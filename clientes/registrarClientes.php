<?php

if (isset($_POST['guardar'])) {
    require_once("config.php");

    $config = new Clientes();

    $config-> setCelular($_POST['celular']);
    $config-> setCompania($_POST['compania']);;

    $config-> insertData();

    echo "<script> alert('El cliente fue registrado satisfactoriamente');document.location='clientes.php'</script>";
}

?>