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
$sql = "SELECT * FROM luz_obscuridad";
$result = pg_query($conn, $sql);
#Check if the query was successful
if (!$result) {
    echo "An error occurred.\n";
    exit;
}

#Print the values on the table with a foreach
foreach(pg_fetch_all($result) as $row) {
    echo "<tr>";
    echo "<td>".$row['id_luz_obscuridad']."</td>";
    echo "<td>".$row['fecha']."</td>";
    echo "<td>".$row['hora']."</td>";
    echo "<td>".$row['orto_luna']."</td>";
    echo "<td>".$row['ocaso_luna']."</td>";
    echo "<td>".$row['orto_sol']."</td>";
    echo "<td>".$row['ocaso_sol']."</td>";
    echo "<td>".$row['aurora_civil']."</td>";
    echo "<td>".$row['aurora_nautica']."</td>";
    echo "<td>".$row['crepusculo_civil']."</td>";
    echo "<td>".$row['crepusculo_nautico']."</td>";
    echo "</tr>";
}
?>