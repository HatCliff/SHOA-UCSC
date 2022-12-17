
<?php
include("./../../key/conn.php");
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
#Check if the connection is successful
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}
$sql = "SELECT * FROM boya";
$result = pg_query($conn, $sql);
#Check if the query was successful
if (!$result) {
    echo "An error occurred.\n";
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Medicion</title>
    </head>
    <body>
        <form action="./medicion-delete.php" method="post">
            <!-------Now the same form as above in a table but ordened up to down------->
            <table>
                <tr>
                    <td>Fecha</td>
                    <td><input type="date" name="fecha" id="fecha"></td>
                </tr>
                <tr>
                    <td>Hora</td>
                    <td><input type="time" name="hora" id="hora"></td>
                </tr>
                <tr>
                    <td>Velocidad del viento</td>
                    <td><input type="number" step="any" name="velocidad_viento" id="velocidad_viento"></td>
                </tr>
                <tr>
                    <td>Velocidad maxima del viento</td>
                    <td><input type="number"  step="any"  name="velocidad_maxima_viento" id="velocidad_maxima_viento"></td>
                </tr>
                <tr>
                    <td>Direccion del viento</td>
                    <td><input type="text" name="direccion_viento" id="direccion_viento"></td>
                </tr>
                <tr>
                    <td>Altura significativa</td>
                    <td><input type="number" step="any"  name="altura_significativa" id="altura_significativa"></td>
                </tr>
                <tr>
                    <td>Altura maxima</td>
                    <td><input type="number" step="any"  name="altura_maxima" id="altura_maxima"></td>
                </tr>
                <tr>
                    <td>Temperatura del aire</td>
                    <td><input type="text" name="temperatura_aire" id="temperatura_aire"></td>
                </tr>
                <tr>
                    <td>Coordenadas</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;Latitud</td>
                    <td><input type="text" name="latitud" id="latitud"></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;Longitud</td>
                    <td><input type="text" name="longitud" id="longitud"></td>
                </tr>
                <tr>
                    <td>Direccion media</td>
                    <td><input type="text" name="direccion_media" id="direccion_media"></td>
                </tr>
                <tr>
                    <td>Periodo peak</td>
                    <td><input type="text" name="periodo_peak" id="periodo_peak"></td>
                </tr>
                <tr>
                    <td>Temperatura del agua</td>
                    <td><input type="text" name="temperatura_agua" id="temperatura_agua"></td>
                </tr>
                <tr>
                    <td>Humedad relativa</td>
                    <td><input type="text" name="humedad_relativa" id="humedad_relativa"></td>
                </tr>
                <tr>
                    <td>Boya</td>
                    <td>
                        <select name="boya" id="boya">
                        <?php
                        foreach(pg_fetch_all($result) as $row) {
                            echo "<option value='".$row['id_boya']."'>".$row['id_boya']."</option>";
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Enviar"></td>
                </tr>

            </table>


        </form>
    </body>
</html>