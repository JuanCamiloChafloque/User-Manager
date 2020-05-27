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
        <title>Editar Usuario</title> 
    </head>
    <body>
        <?php
            include_once dirname(__FILE__) . '/config.php';
            $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
            if(mysqli_connect_errno()){
                $str = "Error en la conexión: " . mysqli_connect_errno();
            }
            $ced = $_GET['ced'];
            echo "<h3>Editar perfil</h3>";

            $sql = "SELECT * FROM Personas WHERE Cedula = \"$ced\" ";
            $sql2 = "SELECT * FROM Usuarios WHERE Cedula = \"$ced\" ";
            $query = mysqli_query($con, $sql);
            $fila = mysqli_fetch_array($query);
            $query2 = mysqli_query($con, $sql2);
            $fila2 = mysqli_fetch_array($query2);
            $nombre = $fila['Nombre'];
            $apellido = $fila['Apellido'];
            $correo = $fila['Correo'];
            $edad = $fila['Edad'];
            $rol = $fila2['Rol'];
            $user = $fila2['NombreUsuario'];

            $str="";
            $str .= '<h2>Perfil del Usuario: '. $user .'</h2>';
            $str .= '<form action=\'administrarUsuarios.php\' method=\'post\'>';
            $str .= '<table>';
            $str .= "Nombre: <input type=\"text\" name=\"nombre\" value=\"$nombre\" readonly>";
            $str .= '<br>';
            $str .= "Apellido: <input type=\"text\" name=\"apellido\" value=\"$apellido\" readonly>";
            $str .= '<br>';
            $str .= "Cedula: <input type=\"text\" name=\"cedula\" value=\"$ced\" readonly>";
            $str .= '<br>';
            $str .= "Correo: <input type=\"text\" name=\"correo\" value=\"$correo\" readonly>";
            $str .= '<br>';
            $str .= "Edad: <input type=\"text\" name=\"edad\" value=\"$edad\" readonly>";
            $str .= '<br>';

            if($rol == 'usuario'){
                $str .= '<input name="rol" type="radio" value="usuario" checked="checked"/>Usuario';
                $str .= '<input name="rol" type="radio" value="admin" />Admin';
            }else if($rol == 'admin'){
                $str .= '<input name="rol" type="radio" value="usuario" />Usuario';
                $str .= '<input name="rol" type="radio" value="admin" checked="checked"/>Admin';
            }

            $str .= '<br>';
            $str .= '</table>';
            $str .= '<input type="submit" value=\'Guardar\' name=\'guardar\'>';
            $str .= '<input type="submit" value=\'Eliminar\' name=\'eliminar\'>';
            $str .= '</form>';

            echo $str;
            mysqli_close($con);
        ?>
        <br><br>
        <a href="principal.php">Volver al menú principal</a><br>
        <form action='mostrarVisitas.php' method='post'>
	    	<input type="submit" value='Salir' name='Salir'>
        </form>
    </body>

</html>