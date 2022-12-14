<?php
#Include conn.php file 
include("./../../key/conn.php");
#Create a connection to postgresql
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}

#Retrieve values from DB and print them on the table
#Query to retrieve the values
$sql = "SELECT * FROM boya";
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
echo "<td>Id servicio</td>";
echo "<td>Id boya</td>";
echo "<td>Sensor</td>";
echo "<td>Modelo</td>";
echo "<td>Profundidad</td>";
echo "<td>Estado</td>";
echo "</tr> <br>";
foreach(pg_fetch_all($result) as $row) {
    echo "<tr>";
    echo "<td>".$row['id_servicio']."</td>";
    echo "<td>".$row['id_boya']."</td>";
    echo "<td>".$row['sensor']."</td>";
    echo "<td>".$row['modelo']."</td>";
    echo "<td>".$row['profundidad']."</td>";
    echo "<td>".$row['estado']."</td>";
    echo "</tr>";
}
echo "</table>";
?>


