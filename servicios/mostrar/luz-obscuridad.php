<?php
include("./../../key/conn.php");
#Create a connection to postgresql
$conn =pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}
#Retrieve values from DB and print them on the table
#Query to retrieve the values
$sql = "SELECT * FROM luz_obscuridad";
$result = pg_query($conn, $sql);
#Check if the query was successful
if (!$result) {
    echo "An error occurred.\n";
    exit;
}
echo "<style> table, th, td { padding:5px; } 
        table,tr{ border: 1px solid black; border-collapse: collapse; }}
</style>";
echo "<h3>Luz y obscuridad</h3>";
echo"<table>";
echo "<tr>";
echo "<td>Id servicio</td>";
echo "<td>Id luz obs</td>";
echo "<td>Fecha</td>";
echo "<td>Hora</td>";
echo "</tr> <br>";
foreach(pg_fetch_all($result) as $row) {
    echo "<tr>";
    echo "<td>".$row['id_servicio']."</td>";
    echo "<td>".$row['id_luz_obs']."</td>";
    echo "<td>".$row['fecha']."</td>";
    echo "<td>".$row['hora']."</td>";
    echo "</tr>";
}

echo "</table>";

$sql2 = "SELECT * FROM luna";
$result2 = pg_query($conn, $sql2);
#Check if the query was successful
if (!$result2) {
    echo "An error occurred.\n";
    exit;
}
echo "<h3>Luna</h3>";
echo"<table>";
echo "<tr>";
echo "<td>Id luna</td>";
echo "<td>Ocaso Luna</td>";
echo "<td>Orto Luna</td>";
echo "</tr> <br>";
foreach(pg_fetch_all($result2) as $row) {
    echo "<tr>";
    echo "<td>".$row['id_luna']."</td>";
    echo "<td>".$row['ocaso_luna']."</td>";
    echo "<td>".$row['orto_luna']."</td>";
    echo "</tr>";
}
echo "</table>";

$sql3 = "SELECT * FROM sol";
$result3 = pg_query($conn, $sql3);
#Check if the query was successful
if (!$result3) {
    echo "An error occurred.\n";
    exit;
}
echo "<h3>Sol</h3>";
echo"<table>";
echo "<tr>";
echo "<td>Id sol</td>";
echo "<td>Ocaso Sol</td>";
echo "<td>Orto Sol</td>";
echo "<td>Crepúsculo Civil</td>";
echo "<td>Crepúsculo Náutico</td>";
echo "<td>Aurora Civil</td>";
echo "<td>Aurora Náutica</td>";
echo "</tr> <br>";
foreach(pg_fetch_all($result3) as $row) {
    echo "<tr>";
    echo "<td>".$row['id_sol']."</td>";
    echo "<td>".$row['ocaso_sol']."</td>";
    echo "<td>".$row['orto_sol']."</td>";
    echo "<td>".$row['crepusculo_civil']."</td>";
    echo "<td>".$row['crepusculo_nautico']."</td>";
    echo "<td>".$row['aurora_civil']."</td>";
    echo "<td>".$row['aurora_nautica']."</td>";
    echo "</tr>";
}

echo "</table>";

?>