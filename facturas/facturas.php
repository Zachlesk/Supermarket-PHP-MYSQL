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
          <h3 style="margin: 0px;;"> Home </h3>
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
          <h3 style="margin: 0px; font-weight: 800;"> Facturas </h3>
        </a>
        <a href="../productos/productos.php" style="display: flex;gap:1px;">
        <i class="bi bi-bag-fill"></i>
          <h3 style="margin: 0px;"> Productos </h3>
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
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarEstudiantes"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
            <th scope="col">#</th>
              <th scope="col">EMPLEADO ID</th>
              <th scope="col">CLIENTE ID</th>
              <th scope="col">FECHA</th>
              <th scope="col">DETALLE</th>


            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->
            <?php
              foreach($all as $key => $val){
            ?> 
            
            <tr>
                <td> <?= $val["facturaId"] ?> </td>
                <td> <?= $val["empleadoId"] ?> </td>
                <td> <?= $val["clienteId"] ?> </td>
                <td> <?= $val["fecha"] ?> </td>
                <td>
                  <a class="btn btn-outline-danger" href="../Controllers/Facturas/borrarFacturas.php?facturaId=<?=$val['facturaId']?>&req=delete">
                  <i class="bi bi-trash3"></i>Borrar</a>
                </td>
                <td>
                  <a class="btn btn-outline-warning" href="../Controllers/Facturas/actualizarFacturas.php?facturaId=<?=$val['facturaId']?>">
                  <i class="bi bi-pencil-square"></i>Editar</a>
                </td>
              </tr>
            <?php
              }
            ?>
       

          </tbody>
        
        </table>

      </div>


    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Estudiantes</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>





    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarEstudiantes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Factura</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
          <form class="col d-flex flex-wrap" action="../Controllers/Facturas/registrarFacturas.php" method="post">
              <div class="mb-1 col-12">
                <label for="empleadoId" class="form-label">Empleado Id</label>
                <select class="form-select" aria-label="Default select example" id="empleadoId" name="empleadoId" required>
                  <option selected>Seleccione el id del Empleados</option>
                  <?php
                    foreach($idempleado as $key => $valor){
                    ?> 
                  <option value="<?= $valor["empleadoId"]?>"><?= $valor["empleadoId"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="clienteId" class="form-label">Cliente Id</label>
                <input 
                  type="text"
                  id="clienteId"
                  name="clienteId"
                  class="form-control"
                  required  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="fecha" class="form-label">fecha</label>
                <input 
                  type="date"
                  id="fecha"
                  name="fecha"
                  class="form-control"
                  required  
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