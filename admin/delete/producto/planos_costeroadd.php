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

#Planos Costeros
$region = $_POST['region'];

#sql query to delete the values from form
$sql6 = "DELETE FROM planos_costeros WHERE region = '$region'";
$result6 = pg_query($conn, $sql6);

?>