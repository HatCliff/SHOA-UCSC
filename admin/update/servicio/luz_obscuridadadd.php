<?php
#Include conn.php file 
include("../../../key/conn.php");
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}

#get values from form luz_obscuridad.html
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$orto_luna = $_POST['orto_luna'];
$ocaso_luna = $_POST['ocaso_luna'];
$orto_sol = $_POST['orto_sol'];
$ocaso_sol = $_POST['ocaso_sol'];
$aurora_civil = $_POST['aurora_civil'];
$aurora_nautica = $_POST['aurora_nautica'];
$crepusculo_civil = $_POST['crepusculo_civil'];
$crepusculo_nautico = $_POST['crepusculo_nautico'];

$nueva_fecha = $_POST['nueva_fecha'];
$nueva_hora = $_POST['nueva_hora'];
$nueva_orto_luna = $_POST['nueva_orto_luna'];
$nueva_ocaso_luna = $_POST['nueva_ocaso_luna'];
$nueva_orto_sol = $_POST['nueva_orto_sol'];
$nueva_ocaso_sol = $_POST['nueva_ocaso_sol'];
$nueva_aurora_civil = $_POST['nueva_aurora_civil'];
$nueva_aurora_nautica = $_POST['nueva_aurora_nautica'];
$nueva_crepusculo_civil = $_POST['nueva_crepusculo_civil'];
$nueva_crepusculo_nautico = $_POST['nueva_crepusculo_nautico'];


#sql query to update the values from form
$sql = "UPDATE luz_obscuridad SET fecha='$nueva_fecha', hora='$nueva_hora', orto_luna='$nueva_orto_luna', ocaso_luna='$nueva_ocaso_luna', orto_sol='$nueva_orto_sol', ocaso_sol='$nueva_ocaso_sol', aurora_civil='$nueva_aurora_civil', aurora_nautica='$nueva_aurora_nautica', crepusculo_civil='$nueva_crepusculo_civil', crepusculo_nautico='$nueva_crepusculo_nautico' WHERE fecha='$fecha' AND hora='$hora'";

$result = pg_query($conn, $sql);

if ($result) {
    echo "Se ha actualizado correctamente";
} else {
    echo "Ha ocurrido un error";
}

?>