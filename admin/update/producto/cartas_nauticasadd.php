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
$region = $_POST['region'];}

$nuevo_titulo = $_POST['nuevo_titulo'];
$nuevo_tipo_carta = $_POST['nuevo_tipo_carta'];
$nuevo_escala = $_POST['nuevo_escala'];
$nuevo_edicion = $_POST['nuevo_edicion'];
$nuevo_datum = $_POST['nuevo_datum'];
$nuevo_region = $_POST['nuevo_region'];

#sql query to update the values from form
$sql = "UPDATE cartas_nauticas SET titulo='$nuevo_titulo', tipo_carta='$nuevo_tipo_carta', escala='$nuevo_escala', edicion='$nuevo_edicion', datum='$nuevo_datum', region='$nuevo_region' WHERE titulo='$titulo' AND tipo_carta='$tipo_carta' AND escala='$escala' AND edicion='$edicion' AND datum='$datum' AND region='$region'";

$result = pg_query($conn, $sql);
if ($result) {
    echo "Se ha actualizado correctamente";
} else {
    echo "Ha ocurrido un error";
}
?>