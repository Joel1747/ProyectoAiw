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
echo "</br>";

$modelo=$_REQUEST['modelo'];
echo "</br>";

$select_query ="SELECT * FROM `vehiculo_venda` WHERE `modelo`='$modelo'"; //select para saber cuantos modelos hay disponibles 
$vehiculo = mysqli_query($mysqli_link, $select_query);
while ($fila = mysqli_fetch_array($vehiculo, MYSQLI_ASSOC)) {//while que muestra los datos de los modelos y gaurda los datos en variables
    echo "modelo:" . $fila['modelo'] . "<br/>";
    echo "Cantidade:" . $fila['cantidade'] . "<br/>";
    echo "Descripcion:" . $fila['descricion'] . "<br/>";
    echo "marca:" . $fila['marca'] . "<br/>";
    echo '<img src="'.$fila['foto'].'">';
    echo "<br/>";

    $modelo1=$fila['modelo'];
    $cantidad=$fila['cantidade'];
    $descricion=$fila['descricion'];
    $marca=$fila['marca'];
    $prezo=$fila['prezo'];
    $foto=$fila['foto'];
}
// con este If lo que hacemos es actualizar el modelo o borrarlo en caso de que no queden mas disponibles para comprar
if($cantidad>1){
    $update_queryCantidad = "UPDATE `vehiculo_venda` SET `cantidade`=`cantidade`-1 WHERE `modelo`='$modelo'";
    if(mysqli_query($mysqli_link, $update_queryCantidad)){
        echo "Foi todo ben na actualización </br>";
    }
}
else{
    $delete_query = "DELETE FROM `vehiculo_venda` WHERE `modelo`='$modelo'";
    if (mysqli_query($mysqli_link, $delete_query)) {
        echo "No hay mas de este modelo para comprar";
    }
}

$user_query ="SELECT * FROM `usuario` WHERE `usuario`='$user'"; //select para saber los datos del usuario que esta comprardo
$datosUser = mysqli_query($mysqli_link, $user_query);
while ($fila = mysqli_fetch_array($datosUser, MYSQLI_ASSOC)) {//while que muestra los datos de los modelos y guarda la cantidad del modelo para gestionar su alquiler
    echo "usuario:" . $fila['usuario'] . "<br/>";
    echo "contrasinal:" . $fila['contrasinal'] . "<br/>";
    echo "nome:" . $fila['nome'] . "<br/>";
    echo "direccion:" . $fila['direccion'] . "<br/>";
    echo "telefono:" . $fila['telefono'] . "<br/>";
    echo "nifdni:" . $fila['nifdni'] . "<br/>";
    echo "email:" . $fila['email'] . "<br/>";
    echo "<br/>";

    //guardamos las filas en variables para asi luego poder hacer el insert en la tabla vehiculo_devolto
    $usuario=$fila['usuario'];
    $contrasinal=$fila['contrasinal'];
    $nome=$fila['nome'];
    $direccion=$fila['direccion'];
    $telefono=$fila['telefono'];
    $nifdni=$fila['nifdni'];
    $email=$fila['email'];
}

$fecha=date('d-m-o h:i:s A'); //guardamos en una variable la fecha para luego ponerla en el nombre del archivo
echo $fecha;
$comprobante=fopen("$user,$fecha.txt","a+");
fputs($comprobante,PHP_EOL."Comprobante".PHP_EOL."Modelo: ".$modelo1.PHP_EOL."Cantidade: ".$cantidad.PHP_EOL."Descripcion: ".$descricion.PHP_EOL."Marca: ".$marca.PHP_EOL."Prezo: ".$prezo.PHP_EOL."Usuario: ".$usuario.PHP_EOL."Nome: ".$nome.PHP_EOL."Direccion: ".$direccion.PHP_EOL."Telefono: ".$telefono.PHP_EOL."NifDNI: ".$nifdni.PHP_EOL."Email: ".$email);                                                                         
fclose($comprobante);

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