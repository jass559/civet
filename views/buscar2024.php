<!doctype html>
<html>
<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
  die();
}



session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];
//echo $validar;
if( $validar == null || $validar = ''){

  header("Location: ../includes/login.php");
  die();
  
}

?>

<head>
    <meta charset="utf-8" />

    <title>Buscar</title>
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One"
      rel="stylesheet"
      type="text/css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="img/civet.ico" />

    <link rel="stylesheet" href="../css/es.css">
    <link  rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"></link>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css"></link>

    <script src="https://code.jquery.com/jquery-3.7.0.js"  ></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    
    <header>
     
        <nav class="navbar fixed-top navbar-expand-lg" data-bs-theme="dark" style="background-color: #ec3237;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="img/rU-9M2LK_400x400.jpg" alt="Logo" width="150" height="50" class="d-inline-block align-text-top" ">    
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Nuevo Item</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Reportes
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Exportar a Excel</a></li>
                    <li><a class="dropdown-item" href="../includes/reporte.php" target="_blank">Reporte PDF</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">...</a></li>
                </ul>
                </li>
                <li class="nav-item" >
                
                    
                
                </li>
                <li class="nav-item">
            
                
                </li>
            </ul>
            
            <a class="nav-link p-2" href="#" style="color: #27A90D"><b>Usuario :</b> <?php echo $_SESSION['nombre']; ?></a>
            <a class="nav-link btn btn-warning" href="../includes/_sesion/cerrarSesion.php" style="color: #FFFFFF">Cerrar Sesi&oacute;n</a>
            
            </div>
        </div>
        </nav>

    </header>

    
    <div class="container is-fluid">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
    <!-- 
     <a class="btn btn-primary" href="../includes/excel.php">Excel
     
     </a>
     <a href="../includes/reporte.php" class="btn btn-primary"><b>PDF</b> </a>
    </div>
      <br>



  
        -->


 
      

    <table id="dataciv"  class="table table-striped table-dark table_id display responsive nowrap" data-page-length='25'>

                 
                      <thead>    
                      <tr>
                      <th>Id</th>
                      <th>N&uacute;mero de Parte</th>
                      <th>Descripci&oacute;n</th>
                      <th>Zona</th>
                      <th>M&oacute;dulo</th>
                      <th>Rack</th>
                      <th>N&iacute;vel</th>
                      <th>Cantidad</th>
                      <th>Acciones</th>
                   
                      </tr>
                      </thead>
                      <tbody>

              <?php


    include '../includes/_db.php';

    $query = "SELECT id,codigo_part,descri_part,zona_part, modulo_part,rack_part, nivel_part, total_part FROM items_copy1";


    $dato = mysqli_query($conexion, $query);

    if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){


    // Recorrer los resultados y generar las filas de la tabla


    ?>
    <tr>
    <td> <?php echo $fila['id']?> </td>  
    <td> <?php echo $fila['codigo_part']?> </td>
    <td> <?php echo $fila['descri_part']?> </td>
    <td> <?php echo $fila['zona_part']?> </td>
    <td> <?php echo $fila['modulo_part']?> </td>
    <td> <?php echo $fila['rack_part']?> </td>
    <td> <?php echo $fila['nivel_part']?> </td>
    <td> <?php echo $fila['total_part']?> </td>
    <td>
        <a class='btn btn-primary' href="editar_rep.php?id=<?php echo $fila['id']?> ">
        <img src="../img/lapiz.png" height ="20" width="20" /></a>
        <a class='btn btn-danger'  ><img src="../img/basura.png" height ="20" width="20" /></a>
    </td>
    </tr>




 





    <?php
    }
    }

    else{

    ?>
    <tr class="text-center">
    <td colspan="16">No existen registros</td>
    </tr>


    <?php

    }

    ?>




    </table>

  
    </div>





    <script type="text/javascript">
        var table = new DataTable('#dataciv');





    </script>
</body>
</html>