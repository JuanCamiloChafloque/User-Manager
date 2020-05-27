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
        <title>Login de usuarios</title> 
    </head>
    <body>
        <h1>Login</h1>
        <br>
        <div>
            <h3>Ingrese sus datos</h3>
            <form action="usuarioLogin.php" method="post">
                <label>Usuario:</label>
                <input type="text" placeholder="Ingrese su nombre de usuario..." name="usuario" value="<?php if (isset($_SESSION['user'])){ echo $_SESSION['user']; } ?>"><br>
                <label>Contraseña:</label>
                <input type="password" placeholder="Ingrese su contraseña..." name="password" value="<?php if (isset($_SESSION['password'])){ echo $_SESSION['password']; } ?>"><br>
                <input type="submit" value="Ingresar" name="Ingresar">
            </form>        
        </div>
        <br>

        <a href="principal.php">Volver al menú principal</a>
        <form action='mostrarVisitas.php' method='post'>
	    	<input type="submit" value='Salir' name='Salir'>
        </form>

    </body>
</html>