<?php
header("Content-Type: text/html;charset=utf-8");

session_start();
echo "hola administrador, ".$_SESSION['user'];
?>

<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Menu Admin</title>
</head>
<body>
	<!--botonera de lo que puede hacer el usuario una vez logueado+-->
	<form name="admitiruser" method="POST" action="admitiruser.php">
    	<input type="submit" value="Admitir Usuarios" />
    </form>
	<form name="AñadirAlugar" method="POST" action="AñadirAlugar1.php">
      <input type="submit" value="Añadir Alugar" />
    </form>
	<form name="AñadirVenda" method="POST" action="AñadirVenta1.php">
      <input type="submit" value="Añadir Venda" />
    </form>
    <form name="EliminarAluguer" method="POST" action="EliminarAluguer.php">
      <input type="submit" value="Eliminar Aluguer" />
    </form>
    <form name="EliminarVenda" method="POST" action="EliminarVenda.php">
      <input type="submit" value="Eliminar Venda" />
    </form>
    <form name="MODAluguer" method="POST" action="MODAluguer.php">
      <input type="submit" value="Modificar Aluguer" />
    </form>
    <form name="ModVenta" method="POST" action="ModVenta.php">
      <input type="submit" value="Modificar Venda" />
    </form>
    <form name="Lista Aluguer" method="POST" action="ListaAluguer.php">
      <input type="submit" value="Lista Aluguer" />
    </form>
    <form name="Lista Venda" method="POST" action="ListaVenda.php">
      <input type="submit" value="Lista Venda" />
    </form>
    <form name="volcar devoltos" method="POST" action="pasarDevoltos.php">
      <input type="submit" value="Pasar devoltos a Disponibles" />
    </form>
</body>
</html>