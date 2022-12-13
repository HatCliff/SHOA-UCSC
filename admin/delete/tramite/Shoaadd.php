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
$anio = $_POST['anio'];

#sql query to delete the values from form
$sql = "DELETE FROM boletin WHERE mes = '$mes' AND anio = '$anio'";
$result = pg_query($conn, $sql);

?>