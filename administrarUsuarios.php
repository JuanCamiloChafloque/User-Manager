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
        <title>Administrar usuarios</title> 
    </head>
    <body>
        <?php    
            include_once dirname(__FILE__) . '/config.php';
            $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
            if(mysqli_connect_errno()){
                echo "Error accediendo a la base de datos";
            }

            if(isset($_POST['eliminar'])) {
                $cedula = $_POST['cedula'];
                $sql = "DELETE FROM Usuarios WHERE Cedula = \"$cedula\"";
                if(mysqli_query($con, $sql)){
                    echo "Usuario eliminado correctamente.";
                } else {
                    echo "Error eliminando al usuario";
                }
            }

            if(isset($_POST['guardar'])) {
                $cedula = $_POST['cedula'];
                $rol = $_POST['rol'];
                $sql = "UPDATE Usuarios SET Rol = \"$rol\" WHERE Cedula = \"$cedula\"";
                if(mysqli_query($con, $sql)){
                    echo "Usuario actualizado exitosamente";
                } else {
                    echo "Error actualizando al usuario";
                }
            }
        ?>
        <br>
        <a href="principal.php">Volver al menú principal</a><br><br>
        <form action='mostrarVisitas.php' method='post'>
	    	<input type="submit" value='Salir' name='Salir'>
        </form>

    </body>
</html>