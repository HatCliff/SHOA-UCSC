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
$sql = "SELECT * FROM cartas_nauticas";
$result = pg_query($conn, $sql);
#Check if the query was successful
if (!$result) {
    echo "An error occurred.\n";
    exit;
}
$sql2 = "SELECT * FROM producto";
$result2 = pg_query($conn, $sql2);
#Check if the query was successful
if (!$result) {
    echo "An error occurred.\n";
    exit;
}
foreach(pg_fetch_all($result2) as $row) {
    echo "<tr>";
    echo "<td>".$row['rut_empresa']."<br></td>";
    echo "<td>".$row['precio']."<br></td>";
    echo "<td>".$row['descripcion']."<br></td>";
    echo "<td>".$row['titulo']."<br></td>";
    echo "<td>".$row['tipo_carta']."<br></td>";
    echo "<td>".$row['escala']."<br></td>";
    echo "<td>".$row['edicion']."<br></td>";
    echo "<td>".$row['datum']."<br></td>";
    echo "<td>".$row['region']."<br></td>";
    echo "</tr>";
}
#Print the values on the table with a foreach
foreach(pg_fetch_all($result) as $row) {
    echo "<tr>";
    echo "<td>".$row['nombre']."</td>";
    echo "<td>".$row['precio']."</td>";
    echo "<td>".$row['descripcion']."</td>";
    echo "<td>".$row['titulo']."</td>";
    echo "<td>".$row['tipo_carta']."</td>";
    echo "<td>".$row['escala']."</td>";
    echo "<td>".$row['edicion']."</td>";
    echo "<td>".$row['datum']."</td>";
    echo "<td>".$row['region']."</td>";
    echo "</tr>";
}
?>

