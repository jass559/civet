<?php

$host = "sql207.epizy.com";
$user = "epiz_34255198";
$password = "vq4Ovb1lKWDtuRw";
$database = "epiz_34255198_r_user";


$conexion = mysqli_connect($host, $user, $password, $database);
if(!$conexion){
echo "No se realizo la conexion a la basa de datos, el error fue:".
mysqli_connect_error() ;


}

?>