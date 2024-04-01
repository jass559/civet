<?php
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


$query = "SELECT codigo_part,descri_part,lote_part FROM public.items_copy1";
$result = pg_query($conn, $query);

// Verificar si la consulta fue exitosa
if (!$result) {
    echo "Error al ejecutar la consulta.";
    exit;
}

// Generar la tabla HTML
echo "<table>";
echo "<tr><th>C&oacute;digo</th><th>Descripci&oacute;n</th><th>Lote</th></tr>";

// Recorrer los resultados y generar las filas de la tabla
while ($row = pg_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['codigo_part'] . "</td>";
    echo "<td>" . $row['descri_part'] . "</td>";
    echo "<td>" . $row['lote_part'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Cerrar la conexión
pg_close($conn);
?>