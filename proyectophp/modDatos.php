<?php
header("Content-Type: text/html;charset=utf-8");

session_start();
$user=$_SESSION['user'];
//guardado de datos del form modDatos.html en variables 
$contrasinal=$_REQUEST['contrasinal'];
$nome=$_REQUEST['nome'];
$direccion=$_REQUEST['direccion'];
$telefono=$_REQUEST['telefono'];
$nifdni=$_REQUEST['nifdni'];
$email=$_REQUEST['email'];

$mysqli_link = mysqli_connect("localhost","root","", "frota");
mysqli_set_charset($mysqli_link, "utf8");
if (mysqli_connect_errno())
{
 printf("A conexion con MySQL fallou co erro: %s", mysqli_connect_error());
 exit; 
}
echo "conexión correcta";
echo "</br>";

echo "Modificar datos del usuario: ".$user;
echo "</br>";
//comprobación de si hay campo en blaco y en caso de contener algo ese campo hacer update de ese campo de la tabla 
if(!($contrasinal=="")){
    
    echo $contrasinal." ";
    $update_queryContrasinal = "UPDATE `usuario` SET `contrasinal`='$contrasinal' WHERE `usuario`='$user'";
    if(mysqli_query($mysqli_link, $update_queryContrasinal)){
        echo "Foi todo ben na actualización </br>";
    }
    else{
        echo "no chusta";
    }
}
else{
    echo "Erro ao introducir Contraseña. Faltan datos<br/>";
}

if(!($nome=="")){
    
    echo $nome." ";
    $update_queryNome = "UPDATE `usuario` SET `nome`='$nome' WHERE `usuario`='$user'";
    if(mysqli_query($mysqli_link, $update_queryNome)){
        echo "Foi todo ben na actualización </br>";  
    }
    else{
        echo "no chusta";
    }
}
else{
    echo "Erro ao introducir Nome. Faltan datos<br/>";
}
if(!($direccion=="")){
    
    echo $direccion." ";
    $update_queryDireccion = "UPDATE `usuario` SET `direccion`='$direccion' WHERE `usuario`='$user'";
    if(mysqli_query($mysqli_link, $update_queryDireccion)){
        echo "Foi todo ben na actualización </br>";
    }
    else{
        echo "no chusta";
    }
}
else{
    echo "Erro ao introducir Dirección. Faltan datos<br/>";
}

if(!($telefono=="")){
    
    echo $telefono." ";
    $update_queryTelefono = "UPDATE `usuario` SET `telefono`='$telefono' WHERE `usuario`='$user'";
    if(mysqli_query($mysqli_link, $update_queryTelefono)){
        echo "Foi todo ben na actualización </br>";
    }
    else{
        echo "no chusta";
    }
}
else{
    echo "Erro ao introducir Telefono. Faltan datos<br/>";
}   

if(!($nifdni=="")){
    
    echo $nifdni." ";
    $update_queryNifdni = "UPDATE `usuario` SET `nifdni`='$nifdni' WHERE `usuario`='$user'";
    if(mysqli_query($mysqli_link, $update_queryNifdni)){
        echo "Foi todo ben na actualización </br>";
    }
    else{
        echo "no chusta";
    }
}
else{
    echo "Erro ao introducir nifdni. Faltan datos<br/>";
}

if(!($email=="")){
    
    echo $email." ";
    $update_queryemail = "UPDATE `usuario` SET `email`='$email' WHERE `usuario`='$user'";
    if(mysqli_query($mysqli_link, $update_queryemail)){   
        echo "Foi todo ben na actualización </br>";
    }
    else{
        echo "no chusta";
    }
}
else{
    echo "Erro ao introducir Email. Faltan datos<br/>";
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