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

#Cotas Marea
$latitud = $_POST['latitud'];
$region = $_POST['region'];

#sql query to update the values from form
$sql = "UPDATE cotas_marea SET latitud='$latitud', region='$region' WHERE id_cota=1";

$result = pg_query($conn, $sql);

?>