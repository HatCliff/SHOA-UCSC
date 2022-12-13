<?php
#Include conn.php file 
include("../../../key/conn.php");
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}

#get values from form ./medicion.html
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$velocidad_viento = $_POST['velocidad_viento'];
$velocidad_maxima_viento = $_POST['velocidad_maxima_viento'];
$direccion_viento = $_POST['direccion_viento'];
$altura_significativa = $_POST['altura_significativa'];
$altura_maxima = $_POST['altura_maxima'];
$direccion_maxima = $_POST['direccion_maxima'];
$temperatura_aire = $_POST['temperatura_aire'];
$coordenadas = $_POST['coordenadas'];
$direccion_media = $_POST['direccion_media'];
$periodo_peak = $_POST['periodo_peak'];
$temperatura_agua = $_POST['temperatura_agua'];
$humedad_relativa = $_POST['humedad_relativa'];
$boya = $_POST['boya'];

#sql query to update the values from form
$sql = "UPDATE medicion SET fecha='$fecha', hora='$hora', velocidad_viento='$velocidad_viento', velocidad_maxima_viento='$velocidad_maxima_viento', direccion_viento='$direccion_viento', altura_significativa='$altura_significativa', altura_maxima='$altura_maxima', direccion_maxima='$direccion_maxima', temperatura_aire='$temperatura_aire', coordenadas='$coordenadas', direccion_media='$direccion_media', periodo_peak='$periodo_peak', temperatura_agua='$temperatura_agua', humedad_relativa='$humedad_relativa', boya='$boya' WHERE id_medicion=1";

$result = pg_query($conn, $sql);

?>