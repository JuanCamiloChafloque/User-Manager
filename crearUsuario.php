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
        <title>Crear Usuario</title> 
    </head>
    <body>
        <?php    
            include_once dirname(__FILE__) . '/config.php';
            $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
            if(mysqli_connect_errno()){
                echo "Error accediendo a la base de datos";
            }

            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $password = $_POST['contrasena'];

            $verify = "SELECT * FROM Personas WHERE Cedula = \"$cedula\" ";
            $res = mysqli_query($con, $verify);
            $exists = mysqli_num_rows($res);

            if($exists > 0){

                $verify2 = "SELECT * FROM Usuarios WHERE NombreUsuario = \"$nombre\" ";
                $res2 = mysqli_query($con, $verify2);
                $exists2 = mysqli_num_rows($res2);
                if($exists2 > 0){
                    echo "El usuario no se puede crear. El nombre de usuario ya se encuentra en el sistema";
                } else {
                    $verify3 = "SELECT * FROM Usuarios";
                    $res3 = mysqli_query($con, $verify3);
                    $exists3 = mysqli_num_rows($res3);
                    $rol = "usuario";
                    if ($exists3 == 0){
                        $rol = "admin";
                    }
                    if(CRYPT_SHA512 == 1){
                        $hash = crypt($password, '$6$rounds=5000$unsaltcheveredeejemplo$');
                    }else{
                        echo "SHA-512 no esta soportado.";
                    }
                    $sql = "INSERT INTO Usuarios (Cedula, NombreUsuario, Contrasena, Rol) VALUES (\"$cedula\", \"$nombre\", \"$hash\", \"$rol\")";
                    if(mysqli_query($con, $sql)){
                        echo "Usuario creado exitosamente";
                    }
                }
            } else {
                echo "El usuario no se puede crear. La cedula no se encuentra en la tabla personas";
            }
        ?>
        <br><br>
        <a href="principal.php">Volver al menú principal</a><br>
        <form action='mostrarVisitas.php' method='post'>
	    	<input type="submit" value='Salir' name='Salir'>
        </form>
    </body>
</html>