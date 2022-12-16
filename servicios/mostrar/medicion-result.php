<?php
#Show information of medicion table in database using key\conn.php
#but only the information selected in a select tag with id boya
#and the information is shown in a table

include("./../../key/conn.php");
#Create a connection to postgresql
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}
#receive the value of the select tag with id boya
$boya = $_POST['boya'];

$sql = "SELECT * FROM medicion WHERE id_boya = '$boya'";
$sql2 = "SELECT * FROM boya WHERE id_boya = '$boya'";
$result = pg_query($conn, $sql);
#Check if the query was successful
if (!$result) {
    echo "An error occurred.\n";
    exit;
}

#echo a table with the information of medicion table
#with a pg_fetch_all function
echo "<style> table, th, td { padding:5px; } 
        table,tr{ border: 1px solid black; border-collapse: collapse; }}
</style>";
#display information of boya table
$result2 = pg_query($conn, $sql2);
echo "<h3>Informacion de la boya</h3>";
echo"<table>";
echo "<tr>";
echo "<td>Id boya</td>";
echo "<td>Sensor</td>";
echo "<td>Modelo</td>";
echo "<td>Profundidad</td>";
echo "<td>Estado</td>";
echo "</tr> <br>";
foreach(pg_fetch_all($result2) as $row) {
    echo "<tr>";
    echo "<td>".$row['id_boya']."</td>";
    echo "<td>".$row['sensor']."</td>";
    echo "<td>".$row['modelo']."</td>";
    echo "<td>".$row['profundidad']."</td>";
    echo "<td>".$row['estado']."</td>";
    echo "</tr>";
}
echo "</table>";

echo "<h3>Informacion de medicion</h3>";
echo"<table>";
echo "<tr>";
echo "<td>Id boya</td>";
echo "<td>Medición</td>";
echo "<td>Fecha</td>";
echo "<td>Hora</td>";
echo "<td>T° Aire</td>";
echo "<td>T° Agua</td>";
echo "<td>Latitud</td>";
echo "<td>Longitud</td>";
echo "<td>Direccion Viento</td>";
echo "<td>Velocidad Viento</td>";
echo "<td>Velocidad Max. Viento</td>";
echo "<td>Humedad relativa</td>";
echo "<td>Direccion media</td>";
echo "<td>Periodo peak</td>";
echo "<td>Altura significativa</td>";
echo "<td>Altura maxima</td>";
echo "</tr> <br>";

foreach(pg_fetch_all($result) as $row) {
    echo "<tr>";
    echo "<td>".$row['id_boya']."</td>";
    echo "<td>".$row['id_medicion']."</td>";
    echo "<td>".$row['fecha']."</td>";
    echo "<td>".$row['hora']."</td>";
    echo "<td>".$row['temperatura_aire']."</td>";
    echo "<td>".$row['temperatura_agua']."</td>";
    echo "<td>".$row['latitud']."</td>";
    echo "<td>".$row['longitud']."</td>";
    echo "<td>".$row['direccion_viento']."</td>";
    echo "<td>".$row['velocidad_viento']."</td>";
    echo "<td>".$row['velocidad_max_viento']."</td>";
    echo "<td>".$row['humedad_relativa']."</td>";
    echo "<td>".$row['direccion_media']."</td>";
    echo "<td>".$row['periodo_peak']."</td>";
    echo "<td>".$row['altura_significativa']."</td>";
    echo "<td>".$row['altura_maxima']."</td>";
    echo "</tr>";
}
