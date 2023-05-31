<?php

require_once("config.php");
$data = new Productos();

$id = $_GET["id"]; 

$data->setProductoId($id);
$record = $data->selectOne();
$val = $record[0];
$idcategorias = $data->obtenerCategoriasId();
  $idproveedor = $data->obtenerProveedorId();

if(isset($_POST["editar"])) {
    $data->setCategoriasId($_POST["categoriasId"]);
    $data->setPrecioUnitario($_POST["precioUnitario"]);
    $data->setStock($_POST["stock"]);
    $data->setUnidadesPedidas($_POST["unidadesPedidas"]);
    $data->setProveedorId($_POST["proveedorId"]);
    $data->setNombreProducto($_POST["nombreProducto"]);
    $data->setDescontinuado($_POST["descontinuado"]);


    $data -> update();
    echo "<script> alert('El producto seleccionado ha sido actualizado satisfactoriamente');document.location='productos.php'</script>";
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
                <label for="categoriasId" class="form-label">Categorias ID</label>
                <select class="form-select" aria-label="Default select example" id="categoriasId" name="categoriasId" required>
                  <option selected>Seleccione el id de la Categorias</option>
                  <?php
                    foreach($idcategorias as $key => $valor){
                    ?> 
                  <option value="<?= $valor["categoriasId"]?>"><?= $valor["nombre"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="precioUnitario" class="form-label"> Precio Unitario </label>
                <input 
                  type="text"
                  id="precioUnitario"
                  name="precioUnitario"
                  class="form-control"  
                  value = "<?php echo $val['precioUnitario'];?>"
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="stock" class="form-label"> Stock </label>
                <input 
                  type="text"
                  id="stock"
                  name="stock"
                  class="form-control"
                  value = "<?php echo $val['stock'];?>"
                  
                  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="unidadesPedidas" class="form-label"> Unidades Pedidas </label>
                <input 
                  type="text"
                  id="unidadesPedidas"
                  name="unidadesPedidas"
                  class="form-control"
                  value = "<?php echo $val['unidadesPedidas'];?>"
                  
                  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="categoriasId" class="form-label">Categorias ID</label>
                <select class="form-select" aria-label="Default select example" id="categoriasId" name="categoriasId" required>
                  <option selected>Seleccione el id de la Proveedor Id</option>
                  <?php
                    foreach($idproveedor as $key => $valor){
                    ?> 
                  <option value="<?= $valor["proveedorId"]?>"><?= $valor["nombre"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="nombreProducto" class="form-label"> Nombre Producto </label>
                <input 
                  type="text"
                  id="nombreProducto"
                  name="nombreProducto"
                  class="form-control"
                  value = "<?php echo $val['nombreProducto'];?>"
                  
                  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="descontinuado" class="form-label"> Descontinuado </label>
                <input 
                  type="text"
                  id="descontinuado"
                  name="descontinuado"
                  class="form-control"
                  value = "<?php echo $val['descontinuado   '];?>"
                  
                  
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
              </div>
            </form>  
        <div id="charts1" class="charts"> </div>
      </div>
    </div>

    <div class="parte-derecho " id="detalles" style="background-color:#572364; display:flex; align-items:center;">
      <img src="../images/logoWhite.png" alt="" width="350"> 
</div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>



</body>
</html>


?>