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
?>
<!DOCTYPE html>
<html>
<head>
    <title>Planos costero</title>
</head>
<body>
    <p>
        <form action="./planos_costeros-delete.php" method="post">
            <table>
                <tr>
                    <!-----
                    <td>Id Plano:</td>
                    <td>
                        <select name='id_plano'>
                        <?php
                            $sql = "SELECT * FROM planos_borde_costero";
                            $result = pg_query($conn, $sql);
                            foreach(pg_fetch_all($result) as $row) {
                    
                                echo "<option value=".$row['id_plano'].">" . $row['id_plano'] . "</option>";

                            }
                            
                        ?>
                        </select>
                    </td>
                    --->
                </tr>

                <tr>
                    <td>region</td>
                    <td><input type="text" name="region"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </p>
    
</body>
</html>