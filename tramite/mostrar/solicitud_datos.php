<?php
#Include conn.php file 
include("../../../key/conn.php");
#Create a connection to postgresql 
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}

#Retrieve values from DB and print them on the table
#Query to retrieve the values
$sql = "SELECT * FROM solicitud_datos";
$result = pg_query($conn, $sql);
#Check if the query was successful
if (!$result) {
    echo "An error occurred.\n";
    exit;
}
#Print the values on the table with a foreach
foreach(pg_fetch_all($result) as $row) {
    echo "<tr>";
    echo "<td>".$row['rut_empresa']."</td>";
    echo "<td>".$row['correo_electronico']."</td>";
    echo "<td>".$row['contraseña']."</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['telefono'] . "</td>";
    echo "<td>" . $row['direccion'] . "</td>";
    echo "<td>" . $row['tipo_datos'] . "</td>";
    echo "<td>" . $row['intencion_uso'] . "</td>";
    echo "<td>" . $row['organizacion'] . "</td>";
    echo "<td>" . $row['nombre_solicitante'] . "</td>";
    echo "<td>" . $row['detalle_datos'] . "</td>";
    echo "</tr>";
}
?>
