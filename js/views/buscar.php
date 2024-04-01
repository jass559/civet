<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

  header("Location: ../includes/login.php");
  die();
  
}

$host = "stampy.db.elephantsql.com";
$port = "5432";
$dbname = "iozlsjgu";
$user = "iozlsjgu";
$password = "z-uCoPj66Vi6f54YOSPYcJ2RE4uHGe0N";

// Crear conexión
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Comprobar conexión
if (!$conn) {
  die("Conexión fallida");
}
//echo "Conexión exitosa";
?>
<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="shortcut icon" href="img/civet.ico" />

<link rel="stylesheet" href="../css/estilo.css">
<link rel="stylesheet" href="../css/es.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
    <header class="d-flex flex-wrap justify-content-center  py-3 mb-4 border-bottom">
      <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        
        <img class="bi me-2"  width="50" height="40" src="img/civet.png"  />
        <span class="fs-4">B&uacute;squeda de Repuesto</span>
        <span class="fs-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <span class="fs-4">Usuario : <?php echo $_SESSION['nombre']; ?></span>
        
      </a>

      
    </header>
  </div>
<div class="container is-fluid">




<div class="col-xs-12">
  		
      <br>
		
    <br>
		<div>

          <a class="btn btn-warning" href="../includes/_sesion/cerrarSesion.php">Cerrar Sesi&oacute;n
      <i class="fa fa-power-off" aria-hidden="true"></i>
       </a>

       <a class="btn btn-primary" href="../includes/excel.php">Excel
       <i class="fa fa-table" aria-hidden="true"></i>
       </a>
       <a href="../includes/reporte.php" class="btn btn-primary"><b>PDF</b> </a>
		</div>
		<br>



  <br>


</form>
<div class="container-fluid">
<form class="d-flex">
<input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
placeholder="Buscar ">
<hr>
</form>
</div>

<br>



        


		
        
        
 
      <table class="table table-striped table-dark table_id">

                   
                        <thead>    
                        <tr>
                        <th>C&oacute;digo</th>
                        <th>Descripci&oacute;n</th>
                        <th>Lote</th>
                        <th>Unidad</th>
                        <th>Zona</th>
                        <th>Acciones</th>
                     
                        </tr>
                        </thead>
                        <tbody>

				<?php



$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Comprobar conexión
if (!$conn) {
  die("Conexión fallida");
}
//echo "Conexión exitosa";


$query = "SELECT id,codigo_part,descri_part,lote_part, uni_m_part,zona_part FROM public.items_copy1";
$result = pg_query($conn, $query);


if (!$result) {
  echo "Error al ejecutar la consulta.";
  exit;
}


// Recorrer los resultados y generar las filas de la tabla
while ($row = pg_fetch_assoc($result)) {

  ?>
  <tr>
  <td> <?php echo $row['codigo_part']?> </td>
  <td> <?php echo $row['descri_part']?> </td>
  <td> <?php echo $row['lote_part']?> </td>
  <td> <?php echo $row['uni_m_part']?> </td>
  <td> <?php echo $row['zona_part']?> </td>
  <td><a class='btn btn-primary' href="editar_rep.php?id=<?php echo $row['id']?> "><img src="../img/lapiz.png" height ="20" width="20" /></i> </a>
  <a class='btn btn-danger'  ><img src="../img/basura.png" height ="20" width="20" /></a></td>
  </tr>
 


  
   
  

  
  

  <?php
}
// Cerrar la conexión
pg_close($conn);

?>


</table>

	
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="../js/user.js"></script>
<script src="../js/acciones.js"></script>
<script src="../js/buscador.js"></script>
</body>
</html>