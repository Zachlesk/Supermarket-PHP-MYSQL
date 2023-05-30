<?php
 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 error_reporting(E_ALL);
  require_once("./config.php");

  $data = new Productos();

  $all = $data -> obtainAll();
  $idcategorias = $data->obtenerCategoriasId();
  $idproveedor = $data->obtenerProveedorId();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página </title>
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
        <h3 style="margin-bottom: 2rem;"> Supermarket </h3>
        <img src="../images/icon.jpg" alt="" class="imagenPerfil">
        <h3> Zachlesk </h3>
         <a href="https://github.com/Zachlesk" target="_blank"> <h6 style="font-size: 14px"> <i class="bi bi-github"> </i> GitHub </h6> </a>

      </div>
      <div class="menus">
        <a href="../dashboard.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px; "> Home </h3>
        </a>
        <a href="../categorias/categorias.php" style="display: flex;gap:1px;">
        <i class="bi bi-tags-fill"></i>
          <h3 style="margin: 0px;"> Categorias </h3>
        </a>
        <a href="../clientes/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;"> Clientes </h3>
        </a>
        <a href="../empleados/empleados.php" style="display: flex;gap:1px;">
        <i class="bi bi-person-vcard-fill"></i>
          <h3 style="margin: 0px;"> Empleados </h3>
        </a>
        <a href="../facturas/facturas.php" style="display: flex;gap:1px;">
            <i class="bi bi-receipt-cutoff"></i>
          <h3 style="margin: 0px;"> Facturas </h3>
        </a>
        <a href="../productos/productos.php" style="display: flex;gap:1px;">
        <i class="bi bi-bag-fill"></i>
          <h3 style="margin: 0px; font-weight: 800;"> Productos </h3>
        </a>
        <a href="../proveedores/proveedores.php" style="display: flex;gap:1px;">
        <i class="bi bi-person-heart"></i>
          <h3 style="margin: 0px;"> Proovedores </h3>
        </a>
       


      </div>
    </div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2> Dashboard </h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarProductos"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">CATEGORIA #</th>
              <th scope="col">PRECIO UNIDAD</th>
              <th scope="col">STOCK</th>
              <th scope="col">UNIDADES PEDIDAS</th>
              <th scope="col">PROVEEDOR #</th>
              <th scope="col">NOMBRE PRODUCTO</th>
              <th scope="col">DESCONTINUADO</th>
              <th scope="col">DETALLE</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->
            <?php
              foreach($all as $key => $val){
            ?> 
            
            <tr>
                <td> <?= $val["productoId"] ?> </td>
                <td> <?= $val["categoriasId"] ?> </td>
                <td> <?= $val["precioUnitario"] ?> </td>
                <td> <?= $val["stock"] ?> </td>
                <td> <?= $val["unidadesPedidas"] ?> </td>
                <td> <?= $val["proveedorId"] ?> </td>
                <td> <?= $val["nombreProducto"] ?> </td>
                <td> <?= $val["descontinuado"] ?> </td>
                <td>
                  <a class="btn btn-danger" href="borrarProductos.php?productoId=<?=$val['productoId']?>&req=delete">
                  Borrar</a>
                  <a class="btn btn-warning" href="actualizarProductos.php?facturaId=<?=$val['productoId']?>">
                  Editar</a>
                </td>
              </tr>
            <?php
              }
            ?>
       

          </tbody>
        
        </table>

      </div>


    </div>

    <div class="parte-derecho " id="detalles" style="background-color:#572364; display:flex; align-items:center;">
      <img src="../images/logoWhite.png" alt="" width="350"> 
  

    </div>





    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarProductos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="registrarProductos.php" method="post">
              
            <div class="mb-1 col-12">
                <label for="categoriasId" class="form-label">Categoria Id</label>
                <select class="form-select" aria-label="Default select example" id="categoriasId" name="categoriasId" required>
                  <option selected>Seleccione el id de la categoría </option>
                  <?php
                    foreach($idcategorias as $key => $valor){
                    ?> 
                  <option value="<?= $valor["categoriaId"]?>"><?= $valor["nombres"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>


              <div class="mb-1 col-12">
                <label for="precioUnitario" class="form-label"> Precio Unidad </label>
                <input 
                  type="number"
                  id="precioUnitario"
                  name="precioUnitario"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="stock" class="form-label"> Stock </label>
                <input 
                  type="number"
                  id="stock"
                  name="stock"
                  class="form-control"  
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="unidadesPedidas" class="form-label"> Unidades Pedidas </label>
                <input 
                  type="number"
                  id="unidadesPedidas"
                  name="unidadesPedidas"
                  class="form-control"  
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="proveedorId" class="form-label">Proveedor Id</label>
                <select class="form-select" aria-label="Default select example" id="proveedorId" name="proveedorId" required>
                  <option selected>Seleccione el id del proveedor </option>
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
                <label for="nombreProducto" class="form-label"> Nombre del Producto </label>
                <input 
                  type="text"
                  id="nombreProducto"
                  name="nombreProducto"
                  class="form-control"  
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="descontinuado" class="form-label"> ¿Descontinuado? </label>
                <input 
                  type="text"
                  id="descontinuado"
                  name="descontinuado"
                  class="form-control"  
                 
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="guardar" name="guardar"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>


</body>

</html>