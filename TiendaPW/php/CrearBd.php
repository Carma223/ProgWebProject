<?php

    class CrearBd {
        public $dbhost;
        public $dbuser;
        public $dbpass;
        public $dbname;
        public $tabla:
        public $con;

        // Constructor de clase
        public function_construct(
            $dbname = "collectordb",
            $tabla = "Articulos",
            $dbhost = "localhost",
            $dbuser = "root",
            $dbpass = ""
        )
            {
                $this->dbname = $dbname;
                $this->tabla = $tabla;
                $this->dbhost = $dbhost;
                $this->dbuser = $dbuser;
                $this->dbpass = $dbpass;

                // Crear conexión
                $this->con = mysqli_connect($dbhost, $dbuser, $dbpass);

                // Checar conexión 
                if(!$this->con) {
                    die("Error de conexión:".mysqli_connect_error());
                }

                // Query
                $sql = "CREATE DATABASE IF NOT EXISTS $dbname";


                // Ejecutar query
                if(mysqli_query($this->con,$sql)){
                    $this->con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                    // Crear nueva tabla
                    $sql = "CREATE TABLE IF NOT EXISTS $tabla
                        (id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        articulo VARCHAR(30) NOT NULL,
                        precio INT,
                        imagen VARCHAR(100)
                        );";

                    if(!mysqli_query($this->con, $sql)) {
                        echo "Error al crear la tabla: " .mysqli_error($this->con);
                    }
                
                }else{
                    return false;
                }

            }
    }

?>