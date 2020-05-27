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
        <title>Agregar Personas y Usuarios</title> 
    </head>
    <body>
        <h1>Gestor de personas y Usuarios</h1>
        <br>
        <div>
            <h3>Crear/Actualizar persona</h3>
            <form action="crearPersona.php" method="post">
                <label>Cedula:</label>
                <input type="number" placeholder="Ingrese una cédula..." name="cedula"><br>
                <label>Nombre:</label>
                <input type="text" placeholder="Ingrese un nombre..." name="nombre"><br>
                <label>Apellido:</label>
                <input type="text" placeholder="Ingrese un apellido..." name="apellido"><br>
                <label>Correo:</label>
                <input type="email" placeholder="Ingrese un correo..." name="correo"><br>
                <label>Edad:</label>
                <input type="number" placeholder="Ingrese edad..." name="edad"><br>
                <input type="submit" value="Guardar" name="Guardar">
            </form>        
        </div>
        <br>
        <div>
            <h3>Crear usuario</h3>
            <form action="crearUsuario.php" method="post">
                <label>Nombre del Usuario:</label>
                <input type="text" placeholder="Ingrese un nombre de usuario..." name="nombre"><br>
                <label>Cedula:</label>
                <input type="number" placeholder="Ingrese una cedula..." name="cedula"><br>
                <label>Contraseña:</label>
                <input type="password" placeholder="Ingrese una contraseña..." name="contrasena"><br>
                <input type="submit" value="Guardar" name="Guardar">
            </form>        
        </div>  
        <br>
        <a href="principal.php">Volver al menú principal</a><br><br>
        <form action='mostrarVisitas.php' method='post'>
	    	<input type="submit" value='Salir' name='Salir'>
        </form>

    </body>
</html>