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
// guardamos el modelo y la cantidad de lo que queremos borrar en variables 
$modelo=$_REQUEST['modelo'];
$cantidadeBorrar=$_REQUEST['cantidade'];
//hacemos un select para obtener la cantidad disponible del modelo
$select_query ="SELECT `modelo`, `cantidade`, `descricion`, `marca`, `prezo`, `foto` FROM `vehiculo_venda` WHERE `modelo`='$modelo'";
$result = mysqli_query($mysqli_link, $select_query);
$fila=mysqli_fetch_array($result, MYSQLI_ASSOC);
// guardamos la cantidad total en una variable y calculamos la cantidad restante del modelo 
echo "Cantidad disponible:" . $fila['cantidade'] . "<br/>";
$cantidadeTotal=$fila['cantidade'];
$cantidadeFinal= $cantidadeTotal - $cantidadeBorrar;
// si la cantidad es mayor que 0 haremos un update poniendo la cantidad final de los modelos que nos quede, en cambio si es mayor que la total eliminaremos el modelo
if ($cantidadeFinal > 0){
    $update_queryEliminar = "UPDATE `vehiculo_venda` SET `cantidade`='$cantidadeFinal' WHERE `modelo`='$modelo'";
    if(mysqli_query($mysqli_link, $update_queryEliminar)){
        echo "Cantidade de este modelo ha sido actualizada </br>";
    }
}
else{
    $delete_query = "DELETE FROM `vehiculo_venda` WHERE `modelo`='$modelo'";
    if (mysqli_query($mysqli_link, $delete_query)) {
        echo "Este modelo ha sido retirado de la página";
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