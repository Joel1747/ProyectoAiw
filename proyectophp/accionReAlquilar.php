<?php 
session_start();
echo "hola administrador, ".$_SESSION['user'];
echo "</br>";
header("Content-Type: text/html;charset=utf-8");
echo "Hola, se estan trasladando los vehiculos de devolto a alugar"; 

$mysqli_link = mysqli_connect("localhost",
"root","", "frota");

if (mysqli_connect_errno())
{
 printf("A conexion con MySQL fallou co erro: %s", mysqli_connect_error());
 exit; 
}
echo "</br>";

//muestra los datos de la tabla de los vehiculos disponibles para re-alquilar 
$select_query ="SELECT * FROM `vehiculo_devolto`";
$result = mysqli_query($mysqli_link, $select_query);
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $modelo=$fila['modelo'];
    $cantidade=$fila['cantidade']; 
    $descripcion=$fila['descripcion'];
    $marca = $fila['marca'];
    $usuario = $fila['usuario'];
    $foto = $fila['foto'];
    
    /*hacemos un select en el que sacamos un numrows y como de la tabla de alquiler solo dejamos a 0 los modelos solo tendremos que hacer un update para volcar los vehiculos
    y borrarlos tambien de la tabla devoltos por cada iteracion del bucle*/
    $select_query_modelo ="SELECT * FROM `vehiculo_aluguer` WHERE `modelo`='$modelo'";
    $result1 = mysqli_query($mysqli_link, $select_query_modelo);
    $numfilas=$result1->num_rows;
    if($numfilas=1){
        $update_query = "UPDATE `vehiculo_aluguer` SET `cantidade`=`cantidade`+'$cantidade' WHERE `modelo`='$modelo'";
        if(mysqli_query($mysqli_link, $update_query)){
            echo "vehiculo actualizado </br>";
        }
        $delete_query = "DELETE FROM `vehiculo_devolto` WHERE `modelo`='$modelo'";
        if (mysqli_query($mysqli_link, $delete_query)) {
            echo "volcado";
        }
        echo "</br>";
    }
}


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