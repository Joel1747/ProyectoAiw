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
//muestra los datos de la tabla de los vehiculos disponibles para vender 
echo "</br>";
$select_query ="SELECT * FROM vehiculo_venda"; //select para saber cuantos modelos hay disponibles 
$result = mysqli_query($mysqli_link, $select_query);
$numfilasCochesVenda=$result -> num_rows;

for($i=0;$i<$numfilasCochesVenda;$i++){//for que se ejuta en funcion del numero de modelos diferentes disponibles
    while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {//while que muestra los datos de los modelos y coloca el checkbox para alquiler
        echo '<form name="accionaluguer" method="POST" action="accionvenda.php">';
        echo '<input type="checkbox" name="modelo" value="'.$fila['modelo'].'">';
        echo "modelo:" . $fila['modelo'] . "<br/>";
        echo "Cantidade:" . $fila['cantidade'] . "<br/>";
        echo "Descripcion:" . $fila['descricion'] . "<br/>";
        echo "marca:" . $fila['marca'] . "<br/>";
        echo "prezo:" . $fila['prezo'] . "<br/>";
        echo '<img src="'.$fila['foto'].'">';
        echo "<br/>";
    } 
}
echo '<input type="submit" value="Comprar" /></form>';
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