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
#Get the values from the form boletin.html

#BOLETIN
$mes = $_POST['mes'];
$anio = $_POST['año'];

#sql query to delete the values from form
$sql3 = "DELETE FROM boletin WHERE mes = '$mes' AND año = '$anio'";
$result3 = pg_query($conn, $sql3);


?>