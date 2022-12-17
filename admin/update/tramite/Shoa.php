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

#sql query to update the values from form
$sql = "UPDATE boletin SET mes='$mes', anio='$anio' WHERE id_boletin=1";

$result = pg_query($conn, $sql);

?>