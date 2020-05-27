<?php
    include_once dirname(__FILE__).'/config.php';
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    $sql = "CREATE TABLE Usuarios (

            id int AUTO_INCREMENT,
            Cedula INT NOT NULL,
            NombreUsuario VARCHAR(255),
            Contrasena VARCHAR(255),
            Rol VARCHAR(255),
            PRIMARY KEY (id),
            FOREIGN KEY (Cedula) REFERENCES Personas (Cedula)
        )";
    if(mysqli_query($con, $sql)){
        echo "Tabla de Usuarios creada correctamente.";
    }else{
        echo "Error en la creación ".mysqli_error($con); 
    }
?>