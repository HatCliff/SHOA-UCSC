<?php
#Include conn.php file 
include("../../../key/conn.php");
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}
#Get values from form boya.html

#BOYA
$sensor = $_POST['sensor'];
$modelo = $_POST['modelo'];
$profundidad = $_POST['profundidad'];
$estado = $_POST['estado'];

#sql query to update the values from form
$sql = "UPDATE boya SET sensor='$sensor', modelo='$modelo', profundidad='$profundidad', estado='$estado' WHERE id_boya=1";

$result = pg_query($conn, $sql);

?>