<?php
if(isset($_POST['loguearse'])) {
    require_once("registroUser.php");
    $registrar = new RegistroUser();

    $registrar-> getEmpleadoId(1);
    $registrar-> getUsername($_GET['username']);
    $registrar-> getEmail($_GET['email']);
    $registrar-> getPassword($_GET['password']);


    $registrar-> verify();
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    header("Location: ../dashboard.php");

    echo "<script> alert('Usuario registrado satisfactoriamente');document.location='loginRegister.php'</script>";
}
