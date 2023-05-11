<?php
header("Content-Type: text/html;charset=utf-8");
//sesion para que salude al usuario logueado
session_start();
echo "hola, ".$_SESSION['user'];
?>

<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Menu Usuario</title>
</head>
<body>
	<!--botonera de lo que puede hacer el usuario una vez logueado+-->
	<form name="listavehiculosAluguer" method="POST" action="listavehiculosAluguer.php">
    	<input type="submit" value="lista vehiculos Aluguer" />
    </form>
	<form name="listavehiculosVenta" method="POST" action="listavehiculosVenta.php">
      <input type="submit" value="lista vehiculos Venta" />
    </form>
	<form name="Modificardatosusuario" method="POST" action="modDatos.html">
      <input type="submit" value="Modificar datos usuario" />
    </form>
	<form name="Alugarvehiculos" method="POST" action="Alugarvehiculos.php">
      <input type="submit" value="Alugar vehiculos" />
    </form>
  <form name="Devoluciónvehiculo" method="POST" action="devolucion.php">
      <input type="submit" value="Devolución Vehiculo" />
    </form>
  <form name="Ventavehiculos" method="POST" action="ventaVehiculo.php">
      <input type="submit" value="Venta de Vehiculos" />
    </form>
</body>
</html>