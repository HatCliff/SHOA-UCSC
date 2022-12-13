<?php
#Include conn.php file 
include("../../../key/conn.php");
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}
#get values from form marea.html
$altura = $_POST['altura'];
$nombre_puerto = $_POST['nombre_puerto'];

#sql query to delete the values from form
$sql4 = "DELETE FROM marea WHERE altura = '$altura' AND nombre_puerto = '$nombre_puerto'";
$result4 = pg_query($conn, $sql4);
?>