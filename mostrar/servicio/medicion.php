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
$sql = "SELECT * FROM medicion";
$result = pg_query($conn, $sql);
#Check if the query was successful
if (!$result) {
    echo "An error occurred.\n";
    exit;
}

#Print the values on the table with a foreach
foreach(pg_fetch_all($result) as $row) {
    echo "<tr>";
    echo "<td>".$row['fecha']."</td>";
    echo "<td>".$row['hora']."</td>";
    echo "<td>".$row['velocidad_viento']."</td>";
    echo "<td>".$row['velocidad_maxima_viento']."</td>";
    echo "<td>".$row['direccion_viento']."</td>";
    echo "<td>".$row['altura_significativa']."</td>";
    echo "<td>".$row['altura_maxima']."</td>";
    echo "<td>".$row['direccion_maxima']."</td>";
    echo "<td>".$row['temperatura_aire']."</td>";
    echo "<td>".$row['coordenadas']."</td>";
    echo "<td>".$row['direccion_media']."</td>";
    echo "<td>".$row['periodo_peak']."</td>";
    echo "<td>".$row['temperatura_agua']."</td>";
    echo "<td>".$row['humedad_relativa']."</td>";
    echo "<td>".$row['boya']."</td>";
    echo "</tr>";
}
?>