<?php

require_once("config.php");
$data = new Proveedores();

$id = $_GET["id"]; 

$data->setProveedorId($id);
$record = $data->selectOne();
$val = $record[0];

if(isset($_POST["editar"])) {
    $data->setNombre($_POST["nombre"]);
    $data->setTelefono($_POST["telefono"]);
    $data->setCiudad($_POST["ciudad"]);

    $data -> update();
    echo "<script> alert('El dato seleccionado ha sido actualizado satisfactoriamente');document.location='proveedores.php'</script>";
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Estudiante</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../css/dashboard.css">

</head>

<body>
  <div class="contenedor">
	
    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Camp Skiler.</h3>
        <img src="../images/icon.jpg" alt="" class="imagenPerfil">
        <h3 > Zachlesk </h3>
        <a href="https://github.com/Zachlesk" target="_blank"> <h6 style="font-size: 14px"> <i class="bi bi-github"> </i> GitHub </h6> </a>
      </div>
      <div class="menus">
      <a href="dashboard.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px; font-weight: 800;"> Home </h3>
        </a>
        <a href="./categorias/categorias.php" style="display: flex;gap:1px;">
        <i class="bi bi-tags-fill"></i>
          <h3 style="margin: 0px;"> Categorias </h3>
        </a>
        <a href="./clientes/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;"> Clientes </h3>
        </a>
        <a href="./empleados/empleados.php" style="display: flex;gap:1px;">
        <i class="bi bi-person-vcard-fill"></i>
          <h3 style="margin: 0px;"> Empleados </h3>
        </a>
        <a href="./facturas/facturas.php" style="display: flex;gap:1px;">
            <i class="bi bi-receipt-cutoff"></i>
          <h3 style="margin: 0px;"> Facturas </h3>
        </a>
        <a href="./productos/productos.php" style="display: flex;gap:1px;">
        <i class="bi bi-bag-fill"></i>
          <h3 style="margin: 0px;"> Productos </h3>
        </a>
        <a href="./proveedores/proveedores.php" style="display: flex;gap:1px;">
        <i class="bi bi-person-heart"></i>
          <h3 style="margin: 0px;"> Proovedores </h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
        <h2 class="m-2">Estudiante a Editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">
              <div class="mb-1 col-12">
                <label for="nombre" class="form-label">Nombre</label>
                <input 
                  type="text"
                  id="nombre"
                  name="nombre"
                  class="form-control"  
                  value = "<?php echo $val['nombre'];?>"
                  /> 
                    
              </div>

              <div class="mb-1 col-12">
                <label for="telefono" class="form-label">Telefono</label>
                <input 
                  type="text"
                  id="telefono"
                  name="telefono"
                  class="form-control"  
                  value = "<?php echo $val['telefono'];?>"
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="imagen" class="form-label">Ciudad</label>
                <input 
                  type="text"
                  id="ciudad"
                  name="ciudad"
                  class="form-control"
                  value = "<?php echo $val['ciudad'];?>"
                  
                  
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
              </div>
            </form>  
        <div id="charts1" class="charts"> </div>
      </div>
    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Estudiantes</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>



</body>
</html>


?>