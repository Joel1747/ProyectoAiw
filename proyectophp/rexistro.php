<?php
header("Content-Type: text/html;charset=utf-8");

$user=$_REQUEST['user'];
$contrasinal=$_REQUEST['contrasinal'];
$nome=$_REQUEST['nome'];
$direccion=$_REQUEST['direccion'];
$telefono=$_REQUEST['telefono'];
$nifdni=$_REQUEST['nifdni'];
$email=$_REQUEST['email'];
//comprobador de que no mete nada en blanco
if($user!==""){
    echo $user."</br>";
}
else{
    echo "Erro ao introducir User. Faltan datos<br/>";
}

if($contrasinal!==""){
    echo $contrasinal."</br>";
}
else{
    echo "Erro ao introducir Contraseña. Faltan datos<br/>";
}

if($nome!==""){
    echo $nome."</br>";
}
else{
    echo "Erro ao introducir Nome. Faltan datos<br/>";
}

if($direccion!==""){
    echo $direccion."</br>";
}
else{
    echo "Erro ao introducir Direccion. Faltan datos<br/>";
}

if($nome!==""){
    echo $nome."</br>";
}
else{
    echo "Erro ao introducir Nome. Faltan datos<br/>";
}
if($direccion!==""){
    echo $direccion."</br>";
}
else{
    echo "Erro ao introducir Telefono. Faltan datos<br/>";
}

if($telefono!==""){
    echo $telefono."</br>";
    }
else{
    echo "Erro ao introducir Telefono. Faltan datos<br/>";
    }   
if($nifdni!==""){
    echo $nifdni."</br>";
}
else{
    echo "Erro ao introducir nifdni. Faltan datos<br/>";
}

if($email!==""){
    echo $email."</br>";
    }
else{
    echo "Erro ao introducir Email. Faltan datos<br/>";
}

$mysqli_link = mysqli_connect("localhost",
"root","", "frota");

if (mysqli_connect_errno())
{
 printf("A conexion con MySQL fallou co erro: %s", mysqli_connect_error());
 exit; 
}
echo "</br>";
echo "conexión correcta";

//insert en la BD con los datos del nuevo usuario
$insert_query = "INSERT INTO `novo_rexistro`(`usuario`, `contrasinal`, `nome`, `direccion`, `telefono`, `nifdni`, `email`) VALUES ('$user','$contrasinal','$nome','$direccion','$telefono','$nifdni','$email')";

if(mysqli_query($mysqli_link, $insert_query)) {
    echo "Foi todo ben na inserción";
    mysqli_close($mysqli_link);
    header("Refresh:1;URL=index.html");
}
else{
    echo "No funcionó";
}

mysqli_close($mysqli_link);


?>