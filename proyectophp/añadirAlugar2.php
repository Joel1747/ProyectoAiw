<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
echo "hola, ".$_SESSION['user'];

$modelo=$_REQUEST['modelo'];
$cantidade=$_REQUEST['cantidade'];
$descricion=$_REQUEST['descricion'];
$marca=$_REQUEST['marca'];
$prezo=$_REQUEST['prezo'];
$foto=$_REQUEST['foto'];

//comprobador de que no mete nada en blanco
if($modelo!==""){
    echo $modelo."</br>";
}
else{
    echo "Erro ao introducir modelo. Faltan datos<br/>";
}

if($cantidade!==""){
    echo $cantidade."</br>";
}
else{
    echo "Erro ao introducir cantidade. Faltan datos<br/>";
}

if($descricion!==""){
    echo $descricion."</br>";
}
else{
    echo "Erro ao introducir descricion. Faltan datos<br/>";
}

if($marca!==""){
    echo $marca."</br>";
}
else{
    echo "Erro ao introducir marca. Faltan datos<br/>";
}
    
if($prezo!==""){
    echo $prezo."</br>";
}
else{
    echo "Erro ao introducir prezo. Faltan datos<br/>";
}   

if($foto!==""){
    echo $foto."</br>";
}
else{
    echo "Erro ao introducir foto. Faltan datos<br/>";
}

$mysqli_link = mysqli_connect("localhost",
"root","", "frota");

if (mysqli_connect_errno())
{
 printf("A conexion con MySQL fallou co erro: %s", mysqli_connect_error());
 exit; 
}
echo "</br>";

//insert en la BD con los datos del nuevo usuario
$insert_query = "INSERT INTO `vehiculo_aluguer`(`modelo`, `cantidade`, `descricion`, `marca`, `prezo`, `foto`) VALUES ('$modelo','$cantidade','$descricion','$marca','$prezo','$foto')";
If (mysqli_query($mysqli_link, $insert_query)) {
 echo "Foi todo ben na inserción";
}
else{
    echo "No funcionó";
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