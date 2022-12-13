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
$sql = "SELECT * FROM boletin";
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
    echo "<td>".$row['nombre']."</td>";
    echo "<td>".$row['precio']."</td>";
    echo "<td>".$row['descripcion']."</td>";
    echo "<td>".$row['mes']."</td>";
    echo "<td>".$row['anio']."</td>";
    echo "</tr>";
}
?>

