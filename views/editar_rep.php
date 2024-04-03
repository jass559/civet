<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

    header("Location: ../includes/login.php");
    die();
    

}
//echo $_SESSION['nombre'];
//echo "correrrrrrrrr";


$id= $_GET['id'];


include '../includes/_db.php';
    


    $consulta = "SELECT * FROM items_copy1 WHERE id = $id";
    
    $result = mysqli_query($conexion, $consulta);



    // Verificar si la consulta fue exitosa
    if (!$result) {
        echo "Error al ejecutar la consulta.";
        exit;
    }   else{
  //    echo "consulta ok";

    }
    $rep = mysqli_fetch_assoc($result);
    //echo $rep['modelo_part'];

?>

<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVETCHI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/civet.ico" />
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
<div id="msj" class="alert alert-success" role="alert" style="display: none;">
<p style="text-align:center">Registro Guardado con exito!!</p>
</div>
  <div class="container div-1">
    <header class="d-flex flex-wrap justify-content-center  py-3 mb-4 border-bottom">
    <nav class="navbar fixed-top navbar-expand-lg " data-bs-theme="dark" style="background-color: #ec3237;">
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
  </div>


</div>

    <div class="container ">
        <!-- Se agrega novalidate para que el navegador NO valide, sino lo haga bootstrap-->
        <form class="needs-validation"  action="../includes/_functions.php" method="POST" novalidate>
            
            <!--Dos Input tipo Texto en 2 columnas de 6-->
            <div class="row ">
                
                    <div class="form-floating col-md-3  col-sm-12 col-xs-12 m-2">
                       
                        <input type="text"  id="cod_parte" name="cod_parte"  class="form-control" value="<?php echo $rep['codigo_part'];?>" required>
                        <label class="form-label" for="cod_parte">Cod. de Parte:</label>
                        <div class="valid-feedback">
                          Ok!
                        </div>
                        <div class="invalid-feedback">
                        Inserte un código valido
                        </div>
                    </div>

                
                
                     <div class="form-floating col-md-3 col-sm-12 col-xs-12">
                        
                         
                    </div>


                    <div class="form-check col-md-1 col-sm-3 col-6">
                        <input class="form-check-input" type="radio" name="opcion" id="SDK" value="SDK" <?php echo ($rep["sdk_part"] == "1" ? "checked" : "");?> required>
                        <label class="form-check-label" for="SDK">
                          SDK
                        </label>
                      </div>
                    <div class="form-check col-md-1 col-sm-3 col-6">
                        <input class="form-check-input" type="radio" name="opcion" id="REP" value= "REP"<?php echo ($rep["rep_part"] == "1" ? "checked" : "");?> required>
                        <label class="form-check-label" for="REP">
                          REP.
                        </label>
                    </div>
                    <div class="form-check col-md-1 col-sm-3 col-6">
                        <input class="form-check-input" type="radio" name="opcion" id="CDK" value= "CDK" <?php echo ($rep["cdk_part"] == "1" ? "checked" : "");?> required>
                        <label class="form-check-label" for="CDK">
                          CDK
                        </label>
                    </div>
                    <div class="form-check col-md-1 col-sm-3 col-6"t>
                        <input class="form-check-input" type="radio" name="opcion" id="CBU" value="CBU" <?php echo ($rep["cbu_part"] == "1" ? "checked" : "");?> required>
                        <label class="form-check-label" for="CBU">
                          CBU
                        </label>
                    </div>
                
            </div>

            <div class="row ">&nbsp; </div>
            <div class="row  ">
                

                <div class="form-floating col-md-3 mb-3">
                  <input type="text" name="descrip" id="descrip" class="form-control" value="<?php echo $rep['descri_part'];?>" required>
                  <label class="form-label" for="descrip">Descripci&oacute;n:</label>
                         
                </div>


                <div class="form-floating col-md-1 mb-3">
                        
                         
                </div>
                <div class="form-floatin col-md-2 mb-3">
                <label for="modelo" class="col-xs-2 col-form-label">Mod&eacute;lo</label>
                  <select name="modelo" id="modelo" class="p-3 border bg-light form-select  form-select-sm" aria-label=".form-select-lg example" required>
                    
                    <option  selected disabled>Mod&eacute;lo</option>
                    <option value="A60" <?php if ($rep['modelo_part'] == 'A60') echo ' selected="selected"'; ?>>A60</option>
                    <option value="S30" <?php if ($rep['modelo_part'] == 'S30') echo ' selected="selected"'; ?>>C30</option>
                    <option value="DUOLIKA" <?php if ($rep['modelo_part'] == 'DUOLIKA') echo ' selected="selected"'; ?>>DUOLIKA</option>
                    <option value="JINBA" <?php if ($rep['modelo_part'] == 'JIMBA') echo ' selected="selected"'; ?>>JINBA</option>
                    <option value="XIOBA" <?php if ($rep['modelo_part'] == 'XIOBA') echo ' selected="selected"'; ?>>XIOBA</option>
                    <option value="HIGER BUS" <?php if ($rep['modelo_part'] == 'HIGER BUS') echo ' selected="selected"'; ?>>HIGER BUS</option>
                    <option value="ZNA"<?php if ($rep['modelo_part'] == 'ZNA') echo ' selected="selected"'; ?>>ZNA</option>
                    <option value="MINI VANS" <?php if ($rep['modelo_part'] == 'MINI VANS') echo ' selected="selected"'; ?>>MINI VANS</option>
                    
                  </select>
                  
                  
                </div>
                <div class="form-floatin col-md-2 mb-3">
                <label for="version" class="col-xs-2 col-form-label">Versi&oacute;n</label>
                  <select name="version" id= "version" class="p-3 border bg-light form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option selected disabled>Versi&oacute;n</option>
                    <option value="AT" <?php if ($rep['version_part'] == 'AT') echo 'selected="selected"'; ?>>AT</option>
                    <option value="MT" <?php if ($rep['version_part'] == 'MT') echo 'selected="selected"'; ?>>MT</option>
                    <option value="5T" <?php if ($rep['version_part'] == '5T') echo 'selected="selected"'; ?>>5T</option>
                    <option value="7T" <?php if ($rep['version_part'] == '7T') echo 'selected="selected"'; ?>>7T</option>
                    <option value="C35/C37" <?php if ($rep['version_part'] == 'C35/C37') echo 'selected="selected"'; ?>>C35/C37</option>
                    <option value="CVT" <?php if ($rep['version_part'] =='CVT') echo 'selected="selected"'; ?>>CVT</option>
                    <option value="3,5T" <?php if ($rep['version_part'] == '3,5T') echo 'selected="selected"'; ?>>3,5T</option>
                    <option value="2,1T" <?php if ($rep['version_part'] == '2,1T') echo 'selected="selected"'; ?>>2,1T</option>
                    <option value="26" <?php if ($rep['version_part'] == '26') echo 'selected="selected"'; ?>>26</option>
                    <option value="32" <?php if ($rep['version_part'] == '32') echo 'selected="selected"'; ?>>32</option>
                    <option value="4X2/4X2" <?php if ($rep['version_part'] == '4X4/4X2') echo 'selected="selected"'; ?>>4X4/4X2</option>
                  </select>
                </div>

                <div class="form-floatin col-md-2 mb-3">
                <label for="color" class="col-xs-2 col-form-label">Color</label>
                  <select name="color" id="color" class="p-3 border bg-light form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option selected disabled>Col&oacute;r</option>
                    <option value="DORADO" <?php if ($rep['color_part'] == 'DORADO') echo 'selected="selected"'; ?>>DORADO</option>
                    <option value="BLANCO" <?php if ($rep['color_part'] == 'BLANCO') echo 'selected="selected"'; ?>>BLANCO</option>
                    <option value="BLANCO/GRIS" <?php if ($rep['color_part'] == 'BLANCO/GRIS') echo 'selected="selected"'; ?>>BLANCO/GRIS</option>
                    <option value="BLANCO/NEGRO" <?php if ($rep['color_part'] == 'BLANCO/NEGRO') echo 'selected="selected"'; ?>>BLANCO/NEGRO</option>
                    <option value="NEGRO" <?php if ($rep['color_part'] == 'NEGRO') echo 'selected="selected"'; ?>>NEGRO</option>
                    <option value="GRIS" <?php if ($rep['color_part'] == 'GRIS') echo 'selected="selected"'; ?>>GRIS</option>
                    <option value="PLOMO" <?php if ($rep['color_part'] == 'PLOMO') echo 'selected="selected"'; ?>>PLOMO</option>
                    <option value="PLATA" <?php if ($rep['color_part'] == 'PLATA') echo 'selected="selected"'; ?>>PLATA</option>
                    <option value="CROMADO" <?php if ($rep['color_part'] == 'CROMADO') echo 'selected="selected"'; ?>>CROMADO</option>
                    <option value="TRANSPARENTE" <?php if ($rep['color_part'] == 'TRANSPARENTE') echo 'selected="selected"'; ?>>TRANSPARENTE</option>
                    <option value="N/A" <?php if ($rep['color_part'] == 'N/A') echo 'selected="selected"'; ?>>N/A</option>

                  </select>
                </div>
            </div>
            <div class="row ">&nbsp; </div>
            
            <div class="row ">
                

              <div class="form-floating col-md-3 col-3">
                <input type="text" name="lote" id="lote" class="form-control" value="<?php echo $rep['lote_part'];?>" required>
                <label class="form-label" for="lote">Lote:</label>
                       
              </div>


              <div class="form-floating col-md-2 col-6">
                <input  type="number" name="comfor" id="comfor" class="form-control" value="<?php echo ($rep['conforme_part']== null ? "0" :$rep["conforme_part"] )?>" required>
                <label class="form-label" for="comfor">Comforme:</label>
                       
              </div>
              <div class="form-floating col-md-2 col-6">
                <input  type="number" name="salva" id="salva" class="form-control" value="<?php echo  ( $rep["salvamento_part"] == null ? "0" :$rep['salvamento_part']) ?>" required>
                <label class="form-label" for="salva">Salvamento:</label>
                       
              </div>
              <div class="form-floating col-md-2 col-6">
                <input  type="number" name="scrap" id="scrap" class="form-control" value="<?php echo ($rep['scrap_part']== null ? "0" :$rep["scrap_part"] )?>" required>
                <label class="form-label" for="scrap">Scrap:</label>

                       
              </div>
              <div class="form-floating col-md-1 col-6">
                <input type="text" name="total" id="total" readonly="true" class="form-control" value="<?php echo $rep['total_part'];?>" required>
                <label class="form-label" for="total">Total (Com+Sal+Scr):</label>
                
                       
              </div>
              
          </div>


          <div class="row ">&nbsp; </div>

          <div class="row ">
                
            <div class="form-floatin col-md-2 mb-3">
            <label for="unidad" class="col-xs-2 col-form-label">Unidad</label>
              <select name="unidad" id="unidad" class=" p-3 border bg-light form-select  form-select-sm" aria-label=".form-select-lg example" required>
                <option  disabled>Unidad</option>
                <option value="UND" <?php if ($rep['uni_m_part'] == 'UND') echo 'selected="selected"'; ?>>UND</option>
                <option value="KIT" <?php if ($rep['uni_m_part'] == 'KIT') echo 'selected="selected"'; ?>>KIT</option>
                <option value="PZA" <?php if ($rep['uni_m_part'] == 'PIEZA' || $rep['uni_m_part'] == 'PZA') echo 'selected="selected"'; ?>>PZA</option>
                <option value="ROLLO" <?php if ($rep['uni_m_part'] == 'ROLLO') echo 'selected="selected"'; ?>>ROLLO</option>

              </select>
              
              
            </div>
            <div class="form-floatin col-md-2 mb-3">
            <label for="zona" class="col-xs-2 col-form-label">Zona</label>
              <select name="zona" id="zona" class="p-3 border bg-light form-select form-select-sm" aria-label=".form-select-sm example" required>
                <option selected disabled>Zona</option>
                <option value="A" <?php if ($rep['zona_part'] == 'A') echo 'selected="selected"'; ?>>A</option>
                <option value="B" <?php if ($rep['zona_part'] == 'B') echo 'selected="selected"'; ?>>B</option>
                <option value="C" <?php if ($rep['zona_part'] == 'C') echo 'selected="selected"'; ?>>C</option>
                <option value="D" <?php if ($rep['zona_part'] == 'D') echo 'selected="selected"'; ?>>D</option>
                <option value="E" <?php if ($rep['zona_part'] == 'E') echo 'selected="selected"'; ?>>E</option>
                <option value="F" <?php if ($rep['zona_part'] == 'F') echo 'selected="selected"'; ?>>F</option>
                <option value="G" <?php if ($rep['zona_part'] == 'G') echo 'selected="selected"'; ?>>G</option>
                <option value="H" <?php if ($rep['zona_part'] == 'H') echo 'selected="selected"'; ?>>H</option>
                <option value="I" <?php if ($rep['zona_part'] == 'I') echo 'selected="selected"'; ?>>I</option>
                <option value="J" <?php if ($rep['zona_part'] == 'J') echo 'selected="selected"'; ?>>J</option>
                <option value="K" <?php if ($rep['zona_part'] == 'K') echo 'selected="selected"'; ?>>K</option>
                <option value="L" <?php if ($rep['zona_part'] == 'L') echo 'selected="selected"'; ?>>L</option>
                <option value="M" <?php if ($rep['zona_part'] == 'M') echo 'selected="selected"'; ?>>M</option>
                <option value="N" <?php if ($rep['zona_part'] == 'N') echo 'selected="selected"'; ?>>N</option>
                <option value="O" <?php if ($rep['zona_part'] == 'O') echo 'selected="selected"'; ?>>O</option>
                <option value="P" <?php if ($rep['zona_part'] == 'P') echo 'selected="selected"'; ?>>P</option>
                <option value="Q" <?php if ($rep['zona_part'] == 'Q') echo 'selected="selected"'; ?>>Q</option>
                <option value="R" <?php if ($rep['zona_part'] == 'R') echo 'selected="selected"'; ?>>R</option>
                <option value="S" <?php if ($rep['zona_part'] == 'S') echo 'selected="selected"'; ?>>S</option>
                <option value="T" <?php if ($rep['zona_part'] == 'T') echo 'selected="selected"'; ?>>T</option>
                <option value="U" <?php if ($rep['zona_part'] == 'U') echo 'selected="selected"'; ?>>U</option>
                <option value="V" <?php if ($rep['zona_part'] == 'V') echo 'selected="selected"'; ?>>V</option>
                <option value="W" <?php if ($rep['zona_part'] == 'W') echo 'selected="selected"'; ?>>W</option>
                <option value="X" <?php if ($rep['zona_part'] == 'X') echo 'selected="selected"'; ?>>X</option>
                <option value="Y" <?php if ($rep['zona_part'] == 'Y') echo 'selected="selected"'; ?>>Y</option>
                <option value="Z" <?php if ($rep['zona_part'] == 'Z') echo 'selected="selected"'; ?>>Z</option>

              </select>
            </div>

            <div class="form-floatin col-md-2 mb-2 ">
            <label for="modulo" class="col-xs-2 col-form-label">M&oacute;dulo</label>
              <select name="modulo" id="modulo" class="p-3 border bg-light form-select form-select-sm" aria-label=".form-select-sm example" required>
                <option selected disabled >M&oacute;dulo</option>
                <option value="1" <?php if ($rep['modulo_part'] == '1') echo ' selected="selected"'; ?>>1</option>
                <option value="2" <?php if ($rep['modulo_part'] == '2') echo ' selected="selected"'; ?>>2</option>
                <option value="3" <?php if ($rep['modulo_part'] == '3') echo ' selected="selected"'; ?>>3</option>
                <option value="4" <?php if ($rep['modulo_part'] == '4') echo ' selected="selected"'; ?>>4</option>
                <option value="5" <?php if ($rep['modulo_part'] == '5') echo ' selected="selected"'; ?>>5</option>
                <option value="6" <?php if ($rep['modulo_part'] == '6') echo ' selected="selected"'; ?>>6</option>
                <option value="7" <?php if ($rep['modulo_part'] == '7') echo ' selected="selected"'; ?>>7</option>
                <option value="8" <?php if ($rep['modulo_part'] == '8') echo ' selected="selected"'; ?>>8</option>
                <option value="9" <?php if ($rep['modulo_part'] == '9') echo ' selected="selected"'; ?>>9</option>
                <option value="10" <?php if ($rep['modulo_part'] == '10') echo ' selected="selected"'; ?>>10</option>
                <option value="11" <?php if ($rep['modulo_part'] == '11') echo ' selected="selected"'; ?>>11</option>
                <option value="12" <?php if ($rep['modulo_part'] == '12') echo ' selected="selected"'; ?>>12</option>

                
              </select>
        
              
            </div>

            <div class="form-floatin col-md-2 mb-3">
            <label for="rack" class="col-xs-2 col-form-label">Rack</label>
              <select name="rack" id="rack" class="p-3 border bg-light form-select form-select-sm" aria-label=".form-select-sm example" required>
                <option selected disabled>Rack</option>
                <option value="1" <?php if ($rep['rack_part'] == '1') echo ' selected="selected"'; ?>>1</option>
                <option value="2" <?php if ($rep['rack_part'] == '2') echo ' selected="selected"'; ?>>2</option>
                <option value="3" <?php if ($rep['rack_part'] == '3') echo ' selected="selected"'; ?>>3</option>
                <option value="4" <?php if ($rep['rack_part'] == '4') echo ' selected="selected"'; ?>>4</option>
                <option value="5" <?php if ($rep['rack_part'] == '5') echo ' selected="selected"'; ?>>5</option>
                <option value="6" <?php if ($rep['rack_part'] == '6') echo ' selected="selected"'; ?>>6</option>
                <option value="7" <?php if ($rep['rack_part'] == '7') echo ' selected="selected"'; ?>>7</option>
                <option value="8" <?php if ($rep['rack_part'] == '8') echo ' selected="selected"'; ?>>8</option>
                <option value="9" <?php if ($rep['rack_part'] == '9') echo ' selected="selected"'; ?>>9</option>
                <option value="10" <?php if ($rep['rack_part'] == '10') echo ' selected="selected"'; ?>>10</option>
                <option value="11" <?php if ($rep['rack_part'] == '11') echo ' selected="selected"'; ?>>11</option>
                <option value="12" <?php if ($rep['rack_part'] == '12') echo ' selected="selected"'; ?>>12</option>

              </select>
            </div>


          </div>
          <div class="row ">&nbsp; </div>
          <div class="row ">
            <div class="form-floatin col-md-2 mb-3">
            <label for="nivel" class="col-xs-2 col-form-label">Nivel</label>
              <select name="nivel" id="nivel" class="p-3 border bg-light form-select form-select-sm" aria-label=".form-select-sm example" required>
                <option selected disabled value="">Nivel</option>
                <option value="1" <?php if ($rep['nivel_part'] == '1') echo ' selected="selected"'; ?>>1</option>
                <option value="2" <?php if ($rep['nivel_part'] == '2') echo ' selected="selected"'; ?>>2</option>
                <option value="3" <?php if ($rep['nivel_part'] == '3') echo ' selected="selected"'; ?>>3</option>
                <option value="4" <?php if ($rep['nivel_part'] == '4') echo ' selected="selected"'; ?>>4</option>
                <option value="5" <?php if ($rep['nivel_part'] == '5') echo ' selected="selected"'; ?>>5</option>
                <option value="6" <?php if ($rep['nivel_part'] == '6') echo ' selected="selected"'; ?>>6</option>
                <option value="7" <?php if ($rep['nivel_part'] == '7') echo ' selected="selected"'; ?>>7</option>
                <option value="8" <?php if ($rep['nivel_part'] == '8') echo ' selected="selected"'; ?>>8</option>
                <option value="9" <?php if ($rep['nivel_part'] == '9') echo ' selected="selected"'; ?>>9</option>
                <option value="10" <?php if ($rep['nivel_part'] == '10') echo ' selected="selected"'; ?>>10</option>
                <option value="11" <?php if ($rep['nivel_part'] == '11') echo ' selected="selected"'; ?>>11</option>
                <option value="12" <?php if ($rep['nivel_part'] == '12') echo ' selected="selected"'; ?>>12</option>

              </select>
              <div class="invalid-feedback">
        Elija un Valor
      </div>
            </div>

            <div class="form-floatin col-md-2 mb-2 ">
            <label for="almacen" class="col-xs-2 col-form-label">Almac&eacute;n</label>
              <select name="almacen" id="almacen" class="p-3 border bg-light form-select form-select-sm" aria-label=".form-select-sm example" required>
                <option selected disabled value="">Almac&eacute;n</option>
                <option value="SUPERMERCADO" <?php if ($rep['almacen_part'] == 'SUPERMERCADO') echo ' selected="selected"'; ?>>SUPERMERCADO</option>
                
              </select>

              <div class="form-group">
                                  
                                  <input type="hidden" name="accion" value="editar_rep">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                            </div>
          
          </div>

        </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg" >Guardar</button>
                <!--<button onclick="mostrar_verde()" class="btn " >verde</button> -->
                <a href="buscar2024.php" class="btn btn-danger btn-lg">Cancelar</a>
            </div>

          </form>

    </div>

    <script>
      function mostrar_verde(){

        div = document.getElementById('msj');
            div.style.display = '';
      }
    </script>
    
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>