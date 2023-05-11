<?php
session_start();
echo "hola Usuario, ".$_SESSION['user'];
header("Content-Type: text/html;charset=utf-8");

$mysqli_link = mysqli_connect("localhost",
"root","", "frota");

if (mysqli_connect_errno())
{
 printf("A conexion con MySQL fallou co erro: %s", mysqli_connect_error());
 exit; 
}
echo "</br>";
//muestra los datos de la tabla de los vehiculos disponibles para alquilar 
$select_query ="SELECT * FROM vehiculo_aluguer";
$result = mysqli_query($mysqli_link, $select_query);
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "modelo:" . $fila['modelo'] . "<br/>";
    echo "Cantidade:" . $fila['cantidade'] . "<br/>";
    echo "Descripcion:" . $fila['descricion'] . "<br/>";
    echo "marca:" . $fila['marca'] . "<br/>";
    echo "prezo:" . $fila['prezo'] . "<br/>";
    echo '<img src="'.$fila['foto'].'">';
    echo "<br/>";
}
mysqli_close($mysqli_link);

?>
<html>
    <body>
        <!--Boton para volver al menú-->
        <form name="volver" method="POST" action="menu_user.php">
            <input type="submit" value="Volver menu" />
        </form>
    </body>
</html>