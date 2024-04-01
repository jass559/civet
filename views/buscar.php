<!DOCTYPE html>
<html lang="es">

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="shortcut icon" href="img/civet.ico" />

<link rel="stylesheet" href="../css/estilo.css">
<link rel="stylesheet" href="../css/es.css">
<link  rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"></link>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css"></link>
<script src="https://code.jquery.com/jquery-3.7.0.js"  ></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>


<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <title>Buscar</title>
</head>
<style>
    .div-1 {
        background-color: #EBEBEB;
    }
    
    .div-2 {
    	background-color: #ABBAEA;
    }
    
    .div-3 {
    	background-color: #FBD603;
    }
</style>
<body>
<div class="container div-1">
    <header class="d-flex flex-wrap  py-4 mb-2 ">
      
        
        <img class="bi me-2"  width="50" height="40" src="img/civet.png"  />
        <div class= "col-5 col-sm-3 ">
          <span >B&uacute;squeda de Repuesto</span>
        </div>
        <div class= "col-5 col-sm-3  ">
        <span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>
        <div class= "col-5 col-sm-3  ">
        <span ><b>Usuario :</b> <?php echo $_SESSION['nombre']; ?></span>
        </div>
      
      
    </header>
  </div>
<div class="container is-fluid">




  <div class="col-xs-12">
  		
      <br>
		
    <br>
		<div>
    
      <a class="btn btn-success" href="">Nuevo &iacute;tem
      
       </a>
          <a class="btn btn-warning" href="../includes/_sesion/cerrarSesion.php">Cerrar Sesi&oacute;n
      
       </a>
<!-- 
       <a class="btn btn-primary" href="../includes/excel.php">Excel
       
       </a>
       <a href="../includes/reporte.php" class="btn btn-primary"><b>PDF</b> </a>
	  </div>
		<br>



    
-->
<br>

<div class="container-fluid">
   
  
  

</div>





        


		
        
        
 
      <table id="dataciv" class="table table-striped table-dark table_id display responsive nowrap" data-page-length='25' data->

                   
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


$host = "sql207.epizy.com";
$user = "epiz_34255198";
$password = "vq4Ovb1lKWDtuRw";
$database = "epiz_34255198_r_user";
$conexion=mysqli_connect($host, $user, $password, $database);
 
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
  <td><a class='btn btn-primary' href="editar_rep.php?id=<?php echo $fila['id']?> "><img src="../img/lapiz.png" height ="20" width="20" /></a>
  <a class='btn btn-danger'  ><img src="../img/basura.png" height ="20" width="20" /></a></td>
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

	
  
 
 



<script type="text/javascript">
  var table = new DataTable('#dataciv', {
    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
    },
});
 
 
  
 
  
</script>
</body>
</html>