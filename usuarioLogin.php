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
        <title>Usuarios</title> 
    </head>
    <body>
        <?php
            include_once dirname(__FILE__) . '/config.php';
            $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
            if(mysqli_connect_errno()){
                $str = "Error en la conexión: " . mysqli_connect_errno();
            }

            $_SESSION['user'] = $_POST['usuario'];
            $_SESSION['password'] = $_POST['password'];

            $user = $_POST['usuario'];
            $password = $_POST['password'];

            $verify = "SELECT * FROM Usuarios WHERE NombreUsuario = \"$user\" ";
            $res = mysqli_query($con, $verify);
            $exists = mysqli_num_rows($res);
            if($exists > 0){
                $query = mysqli_query($con, $verify);
                $fila = mysqli_fetch_array($query);
                $rol = $fila['Rol'];
                $hash = $fila['Contrasena'];
                $cedula = $fila['Cedula'];
                if(hash_equals($hash, crypt($password, $hash))) {

                    $_SESSION['user'] = '';
                    $_SESSION['password'] = '';

                    if($rol == 'usuario'){

                        echo "<h3>Mi perfil: $user</h3>";

                        $sql = "SELECT * FROM Personas WHERE Cedula = \"$cedula\" ";
                        $query2 = mysqli_query($con, $sql);
                        $fila2 = mysqli_fetch_array($query2);
                        $nombre = $fila2['Nombre'];
                        $apellido = $fila2['Apellido'];
                        $correo = $fila2['Correo'];
                        $edad = $fila2['Edad'];

                        $str = "";
                        $str .= "<label>Cedula: $cedula</label><br>";
                        $str .= "<label>Nombre: $nombre</label><br>";
                        $str .= "<label>Apellido: $apellido</label><br>";
                        $str .= "<label>Correo: $correo</label><br>";
                        $str .= "<label>Edad: $edad</label><br>";
                        $str .= "<label>Rol: $rol</label><br>";
            
                        echo $str;

                    } else {
                        $sql = "SELECT * FROM Usuarios WHERE Rol = \"usuario\" ";
                        $query2 = mysqli_query($con, $sql);

                        $str = "";
                        $str .= '<table border = "1"">';
                        $str .= '<tr>';
                        $str .= '<th>Nombre de usuario</th>';
                        $str .= '</tr>';
                        while($fila = mysqli_fetch_array($query2)){
                            $str .= '<tr>';
                            $str .='<td><a href=\'editarUsuario.php?ced='.$fila['Cedula'].'\'>'. $fila['NombreUsuario'] . '</a></td>';
                            $str .= '</tr>';
                        }
                        $str .= '</table>';
                        echo $str;


                    }
                } else {
                    echo "Contraseña incorrecta!";
                }
            } else {
                echo "No existe el usuario con el nombre ingresado";
            }
           
            mysqli_close($con);
        ?>
        <br><br>
        <a href="login.php">Volver al menú de login</a><br>
        <form action='mostrarVisitas.php' method='post'>
	    	<input type="submit" value='Salir' name='Salir'>
        </form>
    </body>

</html>