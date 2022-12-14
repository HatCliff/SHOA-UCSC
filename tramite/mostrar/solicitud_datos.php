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
echo "<style> table, th, td { padding:5px; } 
        table,tr{ border: 1px solid black; border-collapse: collapse; }}
</style>";
echo"<table>";
echo "<tr>";
echo "<td>Num Solicitud</td>";
echo "<td>Id Trámite</td>";
echo "<td>Nombre Solicitante</td>";
echo "<td>Tipo datos</td>";
echo "<td>Intencion Uso</td>";
echo "<td>Organizacion</td>";
echo "<td>Actividad Giro</td>";
echo "<td>Detalle datos</td>";
echo "</tr> <br>";
#Print the values on the table with a foreach
foreach(pg_fetch_all($result) as $row) {
        echo "<tr>";
        echo "<td>".$row['num_solicitud']."</td>";
        echo "<td>".$row['id_tramite']."</td>";
        echo "<td>".$row['nombre_solicitante']."</td>";
        echo "<td>".$row['tipo_datos']."</td>";
        echo "<td>".$row['intencion_uso']."</td>";
        echo "<td>".$row['organizacion']."</td>";
        echo "<td>".$row['actividad_giro']."</td>";
        echo "<td>".$row['detalle_datos']."</td>";
        echo "</tr> <br>";
}
echo "</table>";
?>

