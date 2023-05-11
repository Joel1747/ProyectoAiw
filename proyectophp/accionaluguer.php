<?php
header("Content-Type: text/html;charset=utf-8");

session_start();
echo "hola, ".$_SESSION['user'];

$user=$_SESSION['user'];

$mysqli_link = mysqli_connect("localhost",
"root","", "frota");
if (mysqli_connect_errno())
{
 printf("A conexion con MySQL fallou co erro: %s", mysqli_connect_error());
 exit; 
}

$modelo=$_REQUEST['modelo'];
echo "</br>";

$select_query ="SELECT * FROM `vehiculo_aluguer` WHERE `modelo`='$modelo'"; //select para saber cuantos modelos hay disponibles 
$vehiculo = mysqli_query($mysqli_link, $select_query);
while ($fila = mysqli_fetch_array($vehiculo, MYSQLI_ASSOC)) {//while que muestra los datos de los modelos y guarda la cantidad del modelo para gestionar su alquiler
    echo "modelo:" . $fila['modelo'] . "<br/>";
    echo "Cantidade:" . $fila['cantidade'] . "<br/>";
    echo "Descripcion:" . $fila['descricion'] . "<br/>";
    echo "marca:" . $fila['marca'] . "<br/>";
    echo "prezo:" . $fila['prezo'] . "<br/>";
    echo '<img src="'.$fila['foto'].'">';
    echo "<br/>";
    //guardamos las filas en variables para asi luego poder hacer el insert en la tabla vehiculo_alugado
    $modelo1=$fila['modelo'];
    $cantidad=$fila['cantidade'];
    $descricion=$fila['descricion'];
    $marca=$fila['marca'];
    $prezo=$fila['prezo'];
    $foto=$fila['foto'];
    
}
echo "</br>";
//este if lo que hace es que si queda mas de un coche hacer el el movimiento y restarle uno, pero sino indica que no quedan mas disponibles
if($cantidad>=1){
    $cantidad=$cantidad-1;
    $update_queryCantidad = "UPDATE `vehiculo_aluguer` SET `cantidade`='$cantidad' WHERE `modelo`='$modelo'";//si hay un modelo o mas disponible le resta uno a la cantidad 
    if(mysqli_query($mysqli_link, $update_queryCantidad)){
        echo "Foi todo ben na actualización </br>";
        //con el siguente select comprobamos si el usuario tiene mas de ese modelo alquilados y guardamos el numrows en una variable
        $select_query = "SELECT * FROM `vehiculo_alugado` WHERE `modelo`='$modelo' AND `usuario`='$user'";
        $comprobarUpdate = mysqli_query($mysqli_link, $select_query);
        $numfilasAlugados=$comprobarUpdate -> num_rows;
        echo "</br>";
        
        //con este if si existe el modelo alquilado por el usuario le incrementamos en uno la cantidad y en caso de que no añadimos una nueva linea con los datos del coche y nombre del usuario
        if($numfilasAlugados == 1){
            $UpdateAlugado = "UPDATE `vehiculo_alugado` SET `cantidade`=`cantidade`+1 WHERE `modelo`='$modelo' AND `usuario`='$user'";
            if(mysqli_query($mysqli_link, $UpdateAlugado)){
                echo "Vehiculo Alugado </br>";
            }
            else{
                echo "no chusta";
            }
        }
        //si no hay el mismo modelo alquilado ya por el mismo user, se creara una nueva entrada en la tabla
        else{
            $insert_query = "INSERT INTO `vehiculo_alugado`(`modelo`, `cantidade`, `descricion`, `marca`, `foto`,`usuario`) VALUES ('$modelo1','1','$descricion','$marca','$foto','$user')";
            mysqli_query($mysqli_link, $insert_query);
            echo "nuevo vehiculo alugado";
        }
        
    }
    else{
        echo "no chusta";
    }
}
else{
    echo "no hay disponibles en este momento";
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