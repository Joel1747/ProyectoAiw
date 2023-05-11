<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
echo "hola, ".$_SESSION['user'];
?>

<html lang="es">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Añadir nuevos vehiculos</title>
  </head>
  <body>
    <form name="añadirAlugar" method="POST" action="añadirVenta2.php">
      Modelo: <input type="text" name="modelo" value="" />
      <br />
      Cantidade:<input type="text" name="cantidade" value="" />
      <br />
      Descricion:<input type="text" name="descricion" value="" />
      <br />
      Marca:<input type="text" name="marca" value="" />
      <br />
      Prezo:<input type="text" name="prezo" value="" />
      <br />
      Foto:<input type="text" name="foto" value="" />
      <input type="submit" value="Añadir vehiculo venta" />
    </form>
    <form name="volver" method="POST" action="xestionAdmin.php">
      <input type="submit" value="Volver menu" />
    </form>

  </body>
</html>