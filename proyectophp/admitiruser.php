<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
echo "hola, ".$_SESSION['user'];

$mysqli_link = mysqli_connect("localhost",
"root","", "frota");

if (mysqli_connect_errno())
{
 printf("A conexion con MySQL fallou co erro: %s", mysqli_connect_error());
 exit; 
}
echo "</br>";

//muestra los datos de la tabla de los vehiculos disponibles para alquilar 
$select_query ="SELECT * FROM novo_rexistro";
$result = mysqli_query($mysqli_link, $select_query);
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "usuario:" . $fila['usuario'] . "<br/>";
    echo "contrasinal:" . $fila['contrasinal'] . "<br/>";
    echo "nome:" . $fila['nome'] . "<br/>";
    echo "direccion:" . $fila['direccion'] . "<br/>";
    echo "telefono:" . $fila['telefono'] . "<br/>";
    echo "nifdni:" . $fila['nifdni'] . "<br/>";
    echo "email:" . $fila['email'] . "<br/>";
    echo "<br/>";
}

mysqli_close($mysqli_link);
echo '<form name="accionaluguer" method="POST" action="accionAñadirUser.php">';
echo '<input type="submit" value="Rexistrar usuarios" /></form>';
?>
<html>
    <body>
        <!--Boton para volver al menú-->
        <form name="volver" method="POST" action="xestionAdmin.php">
            <input type="submit" value="Volver menu" />
        </form>
    </body>
</html>