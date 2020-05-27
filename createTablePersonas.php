<?php
    include_once dirname(__FILE__).'/config.php';
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    $sql = "CREATE TABLE Personas (
            Cedula INT NOT NULL,
            Nombre CHAR(15),
            Apellido CHAR(15),
            Correo CHAR(50),
            Edad INT,
            PRIMARY KEY (Cedula)
        )";
    if(mysqli_query($con, $sql)){
        echo "Tabla de personas creada correctamente.";
    }else{
        echo "Error en la creación ".mysqli_error($con); 
    }
?>