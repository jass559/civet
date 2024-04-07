<?php


header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte.xls");
?>


<table class="table table-striped table-dark " id= "table_id">

                   
<thead>    
<tr>
<th>Id</th>
<th>C&oacute;digo</th>
<th>Descripci&oacute;n</th>
<th>Cantidad</th>
<th>Costo</th>



</tr>
</thead>
<tbody>

<?php

include '../includes/_db.php';         
$SQL="SELECT items_copy1.id,items_copy1.codigo_part,items_copy1.descri_part,items_copy1.total_part, items_copy1.costo_part FROM items_copy1";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
while($fila=mysqli_fetch_array($dato)){

?>
<tr>
<td><?php echo $fila['id']; ?></td>
<td><?php echo $fila['codigo_part']; ?></td>
<td><?php echo $fila['descri_part']; ?></td>
<td><?php echo $fila['total_part']; ?></td>
<td><?php echo $fila['costo_part']; ?></td>



<?php
}

}
