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

$nueva_fecha = $_POST['nueva_fecha'];
$nueva_hora = $_POST['nueva_hora'];
$nueva_velocidad_viento = $_POST['nueva_velocidad_viento'];
$nueva_velocidad_maxima_viento = $_POST['nueva_velocidad_maxima_viento'];
$nueva_direccion_viento = $_POST['nueva_direccion_viento'];
$nueva_altura_significativa = $_POST['nueva_altura_significativa'];
$nueva_altura_maxima = $_POST['nueva_altura_maxima'];
$nueva_direccion_maxima = $_POST['nueva_direccion_maxima'];
$nueva_temperatura_aire = $_POST['nueva_temperatura_aire'];
$nueva_coordenadas = $_POST['nueva_coordenadas'];
$nueva_direccion_media = $_POST['nueva_direccion_media'];
$nuevo_periodo_peak = $_POST['nuevo_periodo_peak'];
$nueva_temperatura_agua = $_POST['nueva_temperatura_agua'];
$nueva_humedad_relativa = $_POST['nueva_humedad_relativa'];
$nueva_boya = $_POST['nueva_boya'];

#sql query to update the values from form
$sql = "UPDATE medicion SET fecha='$nueva_fecha', hora='$nueva_hora', velocidad_viento='$nueva_velocidad_viento', velocidad_maxima_viento='$nueva_velocidad_maxima_viento', direccion_viento='$nueva_direccion_viento', altura_significativa='$nueva_altura_significativa', altura_maxima='$nueva_altura_maxima', direccion_maxima='$nueva_direccion_maxima', temperatura_aire='$nueva_temperatura_aire', coordenadas='$nueva_coordenadas', direccion_media='$nueva_direccion_media', periodo_peak='$nuevo_periodo_peak', temperatura_agua='$nueva_temperatura_agua', humedad_relativa='$nueva_humedad_relativa', boya='$nueva_boya' WHERE fecha='$fecha' AND hora='$hora' AND velocidad_viento='$velocidad_viento' AND velocidad_maxima_viento='$velocidad_maxima_viento' AND direccion_viento='$direccion_viento' AND altura_significativa='$altura_significativa' AND altura_maxima='$altura_maxima' AND direccion_maxima='$direccion_maxima' AND temperatura_aire='$temperatura_aire' AND coordenadas='$coordenadas' AND direccion_media='$direccion_media' AND periodo_peak='$periodo_peak' AND temperatura_agua='$temperatura_agua' AND humedad_relativa='$humedad_relativa' AND boya='$boya'";
$result = pg_query($conn, $sql);

if (!$result) {
    echo "An error occurred.\n";
    exit;
}

?>