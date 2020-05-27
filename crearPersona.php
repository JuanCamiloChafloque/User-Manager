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
        <title>Crear Persona</title> 
    </head>
    <body>
        <?php    
            include_once dirname(__FILE__) . '/config.php';
            $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
            if(mysqli_connect_errno()){
                echo "Error accediendo a la base de datos";
            }

            $_SESSION['cedula'] = $_POST['cedula'];
            $_SESSION['nombre'] = $_POST['nombre'];
            $_SESSION['apellido'] = $_POST['apellido'];
            $_SESSION['correo'] = $_POST['correo'];
            $_SESSION['edad'] = $_POST['edad'];

            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $edad = $_POST['edad'];

            $verify = "SELECT * FROM Personas WHERE Cedula = \"$cedula\" ";
            $res = mysqli_query($con, $verify);
            $exists = mysqli_num_rows($res);
            if($exists > 0){
                $sql = "UPDATE Personas SET Nombre = \"$nombre\", Apellido = \"$apellido\", Correo = \"$correo\", Edad = \"$edad\" WHERE Cedula = \"$cedula\"";
                if(mysqli_query($con, $sql)){
                    $_SESSION['cedula'] = '';
                    $_SESSION['nombre'] = '';
                    $_SESSION['apellido'] = '';
                    $_SESSION['correo'] = '';
                    $_SESSION['edad'] = '';
                    echo "Persona actualizada exitosamente";
                }
            } else {
                $sql = "INSERT INTO Personas (Cedula, Nombre, Apellido, Correo, Edad) VALUES (\"$cedula\", \"$nombre\", \"$apellido\", \"$correo\", \"$edad\")";
                if(mysqli_query($con, $sql)){
                    $_SESSION['cedula'] = '';
                    $_SESSION['nombre'] = '';
                    $_SESSION['apellido'] = '';
                    $_SESSION['correo'] = '';
                    $_SESSION['edad'] = '';
                    echo "Persona creada exitosamente";
                }
            }
        ?>
        <br><br>
        <a href="administrarPersonas.php">Volver al administrador de personas</a><br>
        <form action='mostrarVisitas.php' method='post'>
	    	<input type="submit" value='Salir' name='Salir'>
        </form>
    </body>
</html>