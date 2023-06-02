<?php

session_start();

if(isset($_POST['loguearse'])){
    require_once("LoginUser.php");
    $credenciales = new LoginUser();
    $credenciales -> setEmail($_POST['email']);
    $credenciales -> setPassword($_POST['password']);
    $credenciales -> setUsuario($_POST['usuario']);

    $login = $credenciales -> login();

    if($login) {
        header('Location: ../dashboard.php');

    } else{
        echo "<script> alert('Password/Email invalidos');document.location='loginRegister.php';</script>";
    }
}

?>