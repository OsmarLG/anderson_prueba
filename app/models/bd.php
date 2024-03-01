<?php
    class BD {
        protected $conexion;
        protected $isConnected = false;

        public function connect(){
            $this->conexion = new mysqli("localhost", "root", "", "crud_prueba");

            if ($this->conexion->connect_errno) {
                echo 'Error de Conexión'.$this->conexion->connect_errno;
                $this->isConnected = false;
            } else {
                $this->isConnected = true;
            }

            return $this->isConnected;
        }

        public function consult($sql) {
            $result = $this->conexion->query($sql);

            if ($this->conexion->errno) {
                echo 'Error msqli'.$this->conexion->errno;
            }

            return $result;
        }

        public function row_number($result) {
            return $result->num_rows;
        }

        public function close() {
            $this->conexion->close();
        }

        public function select_msqli($query) {
            $con = mysqli_connect('localhost', 'root', '', 'crud_prueba') or die("Connection failed: " . mysqli_connect_error());


            $result = mysqli_query($con, $query);

            return $result;
        }
    }
?>