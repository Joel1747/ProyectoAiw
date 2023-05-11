<?php 
header("Content-Type: text/html;charset=utf-8");
session_start();
echo "hola, ".$_SESSION['user'];
echo "Se estan trasladando los usuarios de novo rexistro a usuarios"; 

$mysqli_link = mysqli_connect("localhost",
"root","", "frota");

if (mysqli_connect_errno())
{
 printf("A conexion con MySQL fallou co erro: %s", mysqli_connect_error());
 exit; 
}
echo "</br>";

//muestra los datos de la tabla de los usuarios a rexistrar
$select_query ="SELECT * FROM novo_rexistro";
$result = mysqli_query($mysqli_link, $select_query);
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $usuario=$fila['usuario'];
    $contrasinal=$fila['contrasinal'];
    $nome=$fila['nome'];
    $direccion=$fila['direccion'];
    $telefono=$fila['telefono'];
    $nifdni=$fila['nifdni'];
    $email=$fila['email'];

    //insert en la BD con los datos del nuevo usuario por cada iteracion del bucle 
    $insert_query = "INSERT INTO `usuario`(`usuario`, `contrasinal`, `nome`, `direccion`, `telefono`, `nifdni`, `email`, `tipo_usuario`) VALUES ('$usuario','$contrasinal','$nome','$direccion','$telefono','$nifdni','$email','u')";
    mysqli_query($mysqli_link, $insert_query);
    $delete_query = "DELETE FROM `novo_rexistro` WHERE `usuario`='$usuario'";
    if (mysqli_query($mysqli_link, $delete_query)) {
        echo "volcado";
    }
    echo "Usuario Admitido";
    echo "</br>";
    
}

echo "Todos os usuarios Admitidos";

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