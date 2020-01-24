   <?php
        
        $configuracion_db = require_once 'config/config.php';

        $mysqli = new mysqli($configuracion_db["host"], $configuracion_db["usuario"],$configuracion_db["password"],$configuracion_db["database"]);

            if ($mysqli->connect_errno) {
                 echo "Fallo la conexion con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                  
             }

   ?>    