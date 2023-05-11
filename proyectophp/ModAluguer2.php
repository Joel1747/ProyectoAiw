<?php 
session_start();
echo "hola administrador, ".$_SESSION['user'];
header("Content-Type: text/html;charset=utf-8");

$_SESSION['modelo']=$_REQUEST['modelo'];
 
?>
<html>
    <body>
        <!--Boton para volver al menú-->
        <form name="añadirAlugar" method="POST" action="ModAluguer3.php">
            Cantidade:<input type="text" name="cantidade" value="" />
            <br />
            Descricion:<input type="text" name="descricion" value="" />
            <br />
            Marca:<input type="text" name="marca" value="" />
            <br />
            Prezo:<input type="text" name="prezo" value="" />
            <br />
            Foto:<input type="text" name="foto" value="" />
            <input type="submit" value="Modificar" />
        </form>

        <form name="volver" method="POST" action="xestionAdmin.php">
            <input type="submit" value="Volver menu" />
        </form>
    </body>
</html>