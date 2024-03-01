<?php
    include_once(__dir__.'/bd.php');

    class getData extends BD{
        public function selectQuery($query) {
            $data = array();

            if (!$this->isConnected) {
                $this->connect();
            }

            $consultar = $this->consult($query);

            if ($this->row_number($consultar)) {
                while ($array = $consultar->fetch_assoc()) {
                    $data[] = $array;
                }
            }

            return $data;
        }

        public function getLastInsert() {
            return $this->conexion->insert_id;
        }

        public function insert_query($query) {
            if ($this->isConnected) {
                $this->connect();
            }
            $consulta = $this->consult($query);
            return $this->getLastInsert();
        }
        public function update($query) {
            if ($this->isConnected) {
                $this->connect();
            }
            $consulta = $this->consult($query);
            return true;
        }
        public function delete_query($query) {
            if ($this->isConnected) {
                $this->connect();
            }
            $consulta = $this->consult($query);
            return true;
        }
    }
?>