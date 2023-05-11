<?php
header("Content-Type: text/html;charset=utf-8");

session_start();
echo "hola, ".$_SESSION['user'];
$user=$_SESSION['user'];

echo "Que vehiculo desea devolver?";
echo "</br>";

//nos conectamos a la base de datos
$mysqli_link = mysqli_connect("localhost",
"root","", "frota");
if (mysqli_connect_errno())
{
 printf("A conexion con MySQL fallou co erro: %s", mysqli_connect_error());
 exit; 
}
echo "</br>";

$alquilados_query ="SELECT * FROM `vehiculo_alugado` WHERE `usuario`='$user'"; //select para saber cuantos modelos hay disponibles 
$numalquilados = mysqli_query($mysqli_link, $alquilados_query);
$numfilasCochesAlugados=$numalquilados -> num_rows;
echo '<form name="accionaluguer" method="POST" action="acciondevolver.php">';
echo '<select name="modelo">';
for($i=0;$i<$numfilasCochesAlugados;$i++){//for que se ejuta en funcion del numero de modelos diferentes disponibles alquilados por el usuario
    while ($fila = mysqli_fetch_array($numalquilados, MYSQLI_ASSOC)) {//while que muestra los datos de los modelos y coloca el checkbox para devolver
        echo '<option value="'.$fila['modelo'].'">'.$fila['modelo'].'</option>';
        echo "<br/>";
    } 
}

echo '</select>';
echo '<input type="submit" value="Devolver" /></form>';
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