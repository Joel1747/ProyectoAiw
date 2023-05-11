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

$modelo=$_SESSION['modelo'];
$cantidade=$_REQUEST['cantidade'];
$descricion=$_REQUEST['descricion'];
$marca=$_REQUEST['marca'];
$prezo=$_REQUEST['prezo'];
$foto=$_REQUEST['foto'];
echo "</br>";
echo $modelo;
echo "</br>";
//comprobador de que campo no esta en blanco y en caso de tener datos actualizarlos
if(!($cantidade=="")){
    
    echo $cantidade." ";
    $update_queryCantidade = "UPDATE `vehiculo_aluguer` SET `cantidade`='$cantidade' WHERE `modelo`='$modelo'";
    if(mysqli_query($mysqli_link, $update_queryCantidade)){
        echo "Foi todo ben na actualización </br>";
    }
    else{
        echo "no chusta";
    }
}
else{
    echo "Cantidade. Campo no actualizado<br/>";
}

if(!($descricion=="")){
    
    echo $descricion." ";
    $update_queryDescricion = "UPDATE `vehiculo_aluguer` SET `descricion`='$descricion' WHERE `modelo`='$modelo'";
    if(mysqli_query($mysqli_link, $update_queryDescricion)){
        echo "Foi todo ben na actualización </br>";  
    }
    else{
        echo "no chusta";
    }
}
else{
    echo "Descricion. Campo no actualizado<br/>";
}
if(!($marca=="")){
    
    echo $marca." ";
    $update_queryMarca = "UPDATE `vehiculo_aluguer` SET `marca`='$marca' WHERE `modelo`='$modelo'";
    if(mysqli_query($mysqli_link, $update_queryMarca)){
        echo "Foi todo ben na actualización </br>";
    }
    else{
        echo "no chusta";
    }
}
else{
    echo "Marca. Campo no actualizado<br/>";
}

if(!($prezo=="")){
    
    echo $prezo." ";
    $update_queryPrezo = "UPDATE `vehiculo_aluguer` SET `prezo`='$prezo' WHERE `modelo`='$modelo'";
    if(mysqli_query($mysqli_link, $update_queryPrezo)){
        echo "Foi todo ben na actualización </br>";
    }
    else{
        echo "no chusta";
    }
}
else{
    echo "Prezo. Campo no actualizado<br/>";
}   

if(!($foto=="")){
    
    echo $foto." ";
    $update_queryFoto = "UPDATE `vehiculo_aluguer` SET `foto`='$foto' WHERE `modelo`='$modelo'";
    if(mysqli_query($mysqli_link, $update_queryFoto)){
        echo "Foi todo ben na actualización </br>";
    }
    else{
        echo "no chusta";
    }
}
else{
    echo "Foto. Campo no actualizado<br/>";
}

mysqli_close($mysqli_link);
?>
<body>
        <!--Boton para volver al menú-->
        <form name="volver" method="POST" action="xestionAdmin.php">
            <input type="submit" value="Volver menu" />
        </form>
    </body>
</html>