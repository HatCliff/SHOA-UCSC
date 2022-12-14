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
if (!$result2) {
    echo "An error occurred.\n";
    exit;
}
echo "<style> table, th, td { border: 1px solid black; padding:5px; } </style>";
echo"<table>";
foreach(pg_fetch_all($result) as $row) {
    
    echo "<tr>";
    echo "<td>Titulo</td>";
    echo "<td>Tipo carta</td>";
    echo "<td>Escala</td>";
    echo "<td>Edicion</td>";
    echo "<td>Datum</td>";
    echo "<td>Region</td>";
    echo "</tr> <br>";
    echo "<tr>";
    echo "<td>".$row['titulo']."</td>";
    echo "<td>".$row['tipo_carta']."</td>";
    echo "<td>".$row['escala']."</td>";
    echo "<td>".$row['edicion']."</td>";
    echo "<td>".$row['datum']."</td>";
    echo "<td>".$row['region']."</td>";
    echo "</tr> <br>";
}
echo "</table>";
?>

