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

        public function insert_query($query, $params) {
            if (!$this->isConnected) {
                $this->connect();
            }
            
            $stmt = $this->conexion->prepare($query);
            if (!$stmt) {
                throw new Exception("Error al preparar la consulta: " . $this->conexion->error);
            }
        
            $stmt->bind_param(str_repeat('s', count($params)), ...$params);
            
            if (!$stmt->execute()) {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }
        
            return $this->getLastInsert();
        }
        
        public function update_query($query, $params) {
            if (!$this->isConnected) {
                $this->connect();
            }
            
            $stmt = $this->conexion->prepare($query);
            if (!$stmt) {
                throw new Exception("Error al preparar la consulta: " . $this->conexion->error);
            }
            
            $types = '';
            foreach ($params as $param) {
                if (is_int($param)) {
                    $types .= 'i'; // Tipo entero
                } elseif (is_double($param)) {
                    $types .= 'd'; // Tipo double
                } else {
                    $types .= 's'; // Tipo string
                }
            }
            
            $stmt->bind_param($types, ...$params);
            
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }
        }

        public function delete_query($query, $params) {
            if (!$this->isConnected) {
                $this->connect();
            }
            $stmt = $this->conexion->prepare($query);
            if (!$stmt) {
                throw new Exception("Error al preparar la consulta: " . $this->conexion->error);
            }
            
            $stmt->bind_param('i', ...$params);
            
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }
        }
    }
?>