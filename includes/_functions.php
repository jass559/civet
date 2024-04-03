<script>
      function mostrar_verde(){

        div = document.getElementById('msj');
        div.style.display = '';
        setTimeout(() => {
        console.log("1 Segundo esperado")
        }, 1000);
      }
    </script>


<?php

//include 'filename';
   
require_once ("_db.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];


    
    

if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

            case 'eliminar_registro';
            eliminar_registro();
    
            break;

            case 'editar_rep';
            editar_rep();
    
            break;

            case 'acceso_user';
            acceso_user();
            break;


		}

	}


    


		
    function editar_registro() {
        include '_db.php';
		extract($_POST);
		$consulta="UPDATE user SET nombre = '$nombre', correo = '$correo', telefono = '$telefono',
		password ='$password', rol = '$rol' WHERE id = '$id' ";

		mysqli_query($conexion, $consulta);


		header('Location: ../views/user.php');

}

function editar_rep() {
    include '_db.php';
    
    $CDK="0";
    $CBU="0";
    $SDK="0";
    $REP="0";

    
    extract($_POST);
    switch ($_POST['opcion']){
        
        case 'CDK':
            $CDK="1";
            break; 

            case 'CBU';
            $CBU="1";
    
            break;

            case 'SDK';
            $SDK="1";
    
            break;

            case 'REP';
            $REP="1";
            break;

        }
        $total= $comfor + $scrap + $salva;
    // Comprobar conexión
    

		


    $consulta = "UPDATE items_copy1 SET 
    nivel_part= '$nivel', 
    codigo_part= '$cod_parte',
    descri_part= '$descrip',
    lote_part= '$lote',
    uni_m_part= '$unidad',
    zona_part= '$zona',
    modulo_part= '$modulo',
    rack_part=  '$rack',
    
    sdk_part= '$SDK',
    rep_part = '$REP',
    cdk_part = '$CDK',
    cbu_part= '$CBU',
    modelo_part= '$modelo',
    version_part= '$version',
    color_part = '$color',
    conforme_part = '$comfor',
    salvamento_part= '$salva'	,
    scrap_part= '$scrap',
    total_part= '$total',
    almacen_part = '$almacen'
      WHERE id = '$id'";
    
    $result= mysqli_query($conexion, $consulta);


		


    // Verificar si la consulta fue exitosa
    if (!$result) {
        echo "Error al ejecutar la consulta.";
        exit;
    } 
    if($result){
        
            echo '<script>mostrar_verde()</script>';
            
            header('Location: ../views/buscar2024.php');
          

    }

     

    

}

function eliminar_registro() {
    include '_db.php';
    extract($_POST);
    $id= $_POST['id'];
    $consulta= "DELETE FROM user WHERE id= $id";

    mysqli_query($conexion, $consulta);


    header('Location: ../views/user.php');

}

function acceso_user() {
    //llamada a la conexion a la BD
    include '_db.php';
   
    $nombre=$_POST['nombre'];
    $password=$_POST['password'];
    session_start();
    $_SESSION['nombre']=$nombre;
    //$conexion=mysqli_connect($host, $user, $password2, $database);
    //$conexion=mysqli_connect("localhost","root","","r_user");
    $consulta= "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['rol'] == 1){ //admin

        header('Location: ../views/user.php');

    }else if($filas['rol'] == 2){//lector
        header('Location: ../views/buscar2024.php');
    }
    
    
    else{

        header('Location: login.php');
        session_destroy();

    }

  
}



?>




