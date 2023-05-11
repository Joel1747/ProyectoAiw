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
//Sirve para introducir el modelo y la cantidad de lo que queremos eliminar 
echo '<form name="accionEliminarAluguer" method="POST" action="accionEliminarAluguer.php">';
echo "Modelo: ";
echo '<input type="text" name="modelo" value="" />';
echo "</br>";
echo "Cantidade: ";
echo '<input type="text" name="cantidade" value="" />';
echo "</br>";
echo '<input type="submit" value="Eliminar Modelo" /></form>';

mysqli_close($mysqli_link);
?>
<html>
    <body>
        <!--Boton para volver al menú-->
        <form name="volver" method="POST" action="xestionAdmin.php">
            <input type="submit" value="Volver menu" />
        </form>
    </body>
</html>