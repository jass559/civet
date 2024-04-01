<script>
      function mostrar_verde(){

        div = document.getElementById('msj');
            div.style.display = '';
      }
    </script>


<?php


   
require_once ("_db.php");

    
    

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
		$conexion=mysqli_connect("localhost","root","","r_user");
		extract($_POST);
		$consulta="UPDATE user SET nombre = '$nombre', correo = '$correo', telefono = '$telefono',
		password ='$password', rol = '$rol' WHERE id = '$id' ";

		mysqli_query($conexion, $consulta);


		header('Location: ../views/user.php');

}

function editar_rep() {
    $CDK="0";
    $CBU="0";
    $SDK="0";
    $REP="0";
    $host = "stampy.db.elephantsql.com";
    $port = "5432";
    $dbname = "iozlsjgu";
    $user = "iozlsjgu";
    $password = "z-uCoPj66Vi6f54YOSPYcJ2RE4uHGe0N";
    // Crear conexión
    $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
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
    if (!$conn) {
        die("Conexión fallida");
    }
    //echo "Conexión exitosa";


    $query = "UPDATE public.items_copy1 SET 
    nivel_part= '$nivel', 
    codigo_part= '$cod_parte',
    descri_part= '$descrip',
    lote_part= '$lote',
    uni_m_part= '$unidad',
    zona_part= '$zona',
    modulo_part= '$modulo',
    rack_part=  '$rack',
    rack2_part= 'x',
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
    
    $result = pg_query($conn, $query);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        echo "Error al ejecutar la consulta.";
        exit;
    } 
    if($result){
        
            echo '<script>mostrar_verde()</script>';
            
            header('Location: ../views/buscar.php');
          

    }

     

    

}

function eliminar_registro() {
    $conexion=mysqli_connect("localhost","root","","r_user");
    extract($_POST);
    $id= $_POST['id'];
    $consulta= "DELETE FROM user WHERE id= $id";

    mysqli_query($conexion, $consulta);


    header('Location: ../views/user.php');

}

function acceso_user() {
    $nombre=$_POST['nombre'];
    $password=$_POST['password'];
    session_start();
    $_SESSION['nombre']=$nombre;

    $conexion=mysqli_connect("localhost","root","","r_user");
    $consulta= "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['rol'] == 1){ //admin

        header('Location: ../views/user.php');

    }else if($filas['rol'] == 2){//lector
        header('Location: ../views/buscar.php');
    }
    
    
    else{

        header('Location: login.php');
        session_destroy();

    }

  
}



?>




