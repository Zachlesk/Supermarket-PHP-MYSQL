<?php

require_once("config.php");

$record = new Clientes();

if (isset($_GET["id"]) && isset($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        $record -> setClienteId($_GET["id"]);
        $record -> delete();
        echo "<script> alert('El cliente seleccionado ha sido borrado satisfactoriamente');document.location='clientes.php'</script>";
    }
}

?>