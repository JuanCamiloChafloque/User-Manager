<?php
    session_start();
    if(isset($_SESSION['visitas'])){
        echo 'total visitas: '. $_SESSION['visitas'];
        unset($_SESSION['visitas']);
    }
    echo "<br>";
    echo "<a href=\"principal.php\">Volver al menú principal</a>";
?>