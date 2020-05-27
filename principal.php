<?php
    session_start();
    if(isset($_SESSION['visitas'])){
        $_SESSION['visitas'] = $_SESSION['visitas'] + 1;
    } else {
        $_SESSION['visitas'] = 1;
    }
?>

<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menú Principal</title> 
    </head>
    <body>
        <h2>Administrador de personas y usuarios</h2>
        <a href="administrarPersonas.php">Administrar personas y usuarios</a><br><br>
        <a href="login.php">Login</a>
        <form action='mostrarVisitas.php' method='post'>
	    	<input type="submit" value='Salir' name='Salir'>
        </form>
    </body>
</html>