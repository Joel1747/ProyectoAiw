<?php 
session_start();
echo "hola administrador, ".$_SESSION['user'];
header("Content-Type: text/html;charset=utf-8");


?>
<html>
    <body>
        <!--Boton para volver al menú-->
        <form name="añadirAlugar" method="POST" action="ModAluguer2.php">
            Modelo: <input type="text" name="modelo" value="" />
        <input type="submit" value="Modificar" />
        </form>

        <form name="volver" method="POST" action="xestionAdmin.php">
            <input type="submit" value="Volver menu" />
        </form>
    </body>
</html>