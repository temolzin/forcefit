<?php
    class NuevoModel extends Model {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($datos) {
            //$this->db->conectar()
            $query = $this->db->conectar()->prepare('INSERT INTO Computadora (MATRICULA, NOMBRE, APELLIDO) values (:matricula, :nombre, :apellido)');
            $query->execute(['matricula' => $datos['matricula'], 'nombre' => $datos['nombre'], 'apellido' => $datos['apellido']]);
            echo 'INSERTAR DATOS NUEVO';
        }
    }
?>
