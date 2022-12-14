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
$sql = "SELECT * FROM solicitud_autorizacion";
$result = pg_query($conn, $sql);
$result2 = pg_query($conn, $sql2);
#Check if the query was successful
if (!$result) {
    echo "An error occurred.\n";
    exit;
}
#Print the values on the table with a foreach
echo "<style> table, th, td { padding:5px; } 
        table,tr{ border: 1px solid black; border-collapse: collapse; }}
</style>";
echo"<table>";
echo "<tr>";
echo "<td>Id Trámite</td>";
echo "<td>Rut Empresa</td>";
echo "<td>Rut Representante</td>";
echo "<td>Institucion</td>";
echo "<td>Razón Social</td>";
echo "<td>Actividad Giro</td>";
echo "<td>Nacionalidad</td>";
echo "<td>Tipo Autorización</td>";
echo "</tr> <br>";
foreach(pg_fetch_all($result) as $row) {      
        echo "<tr>";
        echo "<td>".$row['id_tramite']."</td>";
        echo "<td>".$row['rut_empresa']."</td>";
        echo "<td>".$row['rut_representante']."</td>";
        echo "<td>".$row['institucion']."</td>";
        echo "<td>".$row['razon_social']."</td>";
        echo "<td>".$row['actividad_giro']."</td>";
        echo "<td>".$row['nacionalidad']."</td>";
        echo "<td>".$row['tipo_autorizacion']."</td>";
        echo "</tr> <br>";
}
echo "</table>";
?>

