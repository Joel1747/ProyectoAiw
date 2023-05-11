<?php
header("Content-Type: text/html;charset=utf-8");
//guardado de las variables del form
$user=$_REQUEST['user'];
$contrasinal=$_REQUEST['contrasinal'];
//if para comprobar que no deja campos vacios 
if($user!==""){
echo $user."</br>".$contrasinal;
}
else{
echo "Erro ao introducir datos. Faltan datos";
}
if($contrasinal!==""){
    }
    else{
    echo "Erro ao introducir datos. Faltan datos";
    }

$mysqli_link = mysqli_connect("localhost",
"root","", "frota");

if (mysqli_connect_errno())
{
 printf("A conexion con MySQL fallou co erro: %s", mysqli_connect_error());
 exit; 
}
echo "</br>";

//comprobacion de que el usuario existe 
$select_query = "SELECT usuario FROM usuario WHERE usuario='$user'";
$result = mysqli_query($mysqli_link, $select_query);
$numfilas=$result -> num_rows;
if($numfilas == 0){
    echo "este usuario no existe";
    header("Refresh:1;URL=rexistro.html");
}
else{
    //Comprobación de que los usuarios y contraseña son validos 
    $select_query = "SELECT usuario FROM usuario WHERE usuario='$user' AND contrasinal='$contrasinal'";
    $comprobarusuario = mysqli_query($mysqli_link, $select_query);
    $numfilasUser=$comprobarusuario -> num_rows;
    if($numfilasUser == 1){
        echo "este usuario existe";
        session_start();
        $_SESSION['user']=$_REQUEST['user'];
        $select_query = "SELECT tipo_usuario FROM usuario WHERE usuario='$user'";//comprobación de tipo de usuario
        $comprobarAdmin = mysqli_query($mysqli_link, $select_query);
        $fila = mysqli_fetch_array($comprobarAdmin, MYSQLI_ASSOC);
        echo "Tipo usuario:" . $fila['tipo_usuario'] . "<br/>";
        //en función del tipo de usuario redirigir a usuario normal o admin
        if($fila['tipo_usuario']=="a"){
            header("Location:xestionAdmin.php");
        }
        else{
            header("Location:menu_user.php");
        }
        
    }
    else{
        echo "Contraseña equivocada";
        header("Refresh:1;URL=index.html");
    }
}
mysqli_close($mysqli_link);
?>
