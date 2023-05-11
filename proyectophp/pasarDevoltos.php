<?php 
session_start();
echo "hola administrador, ".$_SESSION['user'];
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
$select_query ="SELECT * FROM vehiculo_devolto";
$result = mysqli_query($mysqli_link, $select_query);
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "modelo:" . $fila['modelo'] . "<br/>";
    echo "Cantidade:" . $fila['cantidade'] . "<br/>";
    echo "Descripcion:" . $fila['descripcion'] . "<br/>";
    echo "marca:" . $fila['marca'] . "<br/>";
    echo "usuario:" . $fila['usuario'] . "<br/>";
    echo '<img src="'.$fila['foto'].'">';
    echo "<br/>";
}

mysqli_close($mysqli_link);
echo '<form name="accionaluguer" method="POST" action="accionReAlquilar.php">';
echo '<input type="submit" value="poner vehiculos a alquilar" /></form>';

?>
<html>
    <body>
        <!--Boton para volver al menú-->
        <form name="volver" method="POST" action="xestionAdmin.php">
            <input type="submit" value="Volver menu" />
        </form>
    </body>
</html>