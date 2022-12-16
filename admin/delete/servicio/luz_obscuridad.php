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

#Get id from form luz_obscuridad table
$sql = "SELECT id_luz_obs FROM luz_obscuridad";
$result = pg_query($conn, $sql);
if (!$result) {
    echo "An error occurred.\n";
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Luz obscuridad</title>
</head>
<body>
    <p>
        <form action="./luz_obscuridad-delete.php" method="post">
            <table>
                <?php 
                    #Print a select with all the id_luz_obscuridad
                    echo "<tr>";
                    echo "<td>id_luz_obscuridad</td>";
                    echo "<td>";
                    echo "<select name='id_luz_obs'>";
                    foreach(pg_fetch_all($result) as $row) {
                        echo "<option value=".$row['id_luz_obs'].">" . $row['id_luz_obs'] . "</option>";
                    }
                ?>
                <tr>
                    <td>fecha</td>
                    <td><input type="date" name="fecha"></td>
                </tr>
                <tr>
                    <td>hora</td>
                    <td><input type="time" name="hora"></td>
                </tr>
                <tr>
                    <td>orto luna</td>
                    <td><input type="text" name="orto_luna"></td>
                </tr>
                <tr>
                    <td>ocaso luna</td>
                    <td><input type="text" name="ocaso_luna"></td>
                </tr>
                <tr>
                    <td>orto sol</td>
                    <td><input type="text" name="orto_sol"></td>
                </tr>
                <tr>
                    <td>ocaso sol</td>
                    <td><input type="text" name="ocaso_sol"></td>
                </tr>
                <tr>
                    <td>aurora civil</td>
                    <td><input type="text" name="aurora_civil"></td>
                </tr>
                <tr>
                    <td>aurora nautica</td>
                    <td><input type="text" name="aurora_nautica"></td>
                </tr>
                <tr>
                    <td>crepusculo nautico</td>
                    <td><input type="text" name="crepusculo_nautico"></td>
                </tr>
                <tr>
                    <td>crepusculo civil</td>
                    <td><input type="text" name="crepusculo_civil"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </p>
</body>