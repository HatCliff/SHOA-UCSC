<?php
#Include conn.php file 
require_once('.././key/conn.php');
#Create a connection to postgresql 
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}
#Get the values from the form shoa.html
$rut_empresa = $_POST['rut_empresa'];
$director = $_POST['director'];
$subdirector = $_POST['subdirector'];
$departamento = $_POST['departamento'];

#sql query to insert the values
$sql2 = "INSERT INTO shoa(rut_empresa,director,subdirector,departamento) VALUES ('$rut_empresa','$director','$subdirector','$departamento')";

#Insert sql query
$result2 = pg_query($conn, $sql2);

#Display if the query was successful or not
if (!$result2) {
    echo "An error occurred.\n";
    exit;
} else {
    echo "Datos ingresados correctamente.\n";
}

?>