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

#CARTAS NAUTICAS
$titulo = $_POST['titulo'];
$tipo_carta = $_POST['tipo_carta'];
$escala = $_POST['escala'];
$edicion = $_POST['edicion'];
$datum = $_POST['datum'];
$region = $_POST['region'];

#sql query to update the values from form
$sql = "UPDATE cartas_nauticas SET titulo='$titulo', tipo_carta='$tipo_carta', escala='$escala', edicion='$edicion', datum='$datum', region='$region' WHERE id_carta=1";

$result = pg_query($conn, $sql);

?>