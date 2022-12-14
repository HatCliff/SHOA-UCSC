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

#sql query to delete the values from form
$sql4 = "DELETE FROM cartas_nauticas WHERE titulo = '$titulo' AND tipo_carta = '$tipo_carta' AND escala = '$escala' AND edicion = '$edicion' AND datum = '$datum' AND region = '$region'";
$result4 = pg_query($conn, $sql4);
#if the query was successful
if ($result4) {
    echo "Se ha eliminado correctamente";
    header("Location: ../../../../admin.php");
} else {
    echo "Ha ocurrido un error";
}

?>