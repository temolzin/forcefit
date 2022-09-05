<?php
    class ComputerDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO computer values (:id_computer, :name_computer, :price_computer, :model_computer, :color_computer)');
            $query->execute([':id_computer'  => null, ':name_computer' => $data['name_computer'],':price_computer' => $data['price_computer'],':model_computer' => $data['model_computer'], ':color_computer' => $data['color_computer']]);
            echo 'ok';
        }

        public function update($data)
        {
            $query = $this->db->conectar()->prepare('UPDATE Computadora SET  nombre = :nombre, apellido = :apellidos WHERE matricula = :matricula');
            $query->execute([':matricula' => $data['matricula'],':nombre' => $data['nombre'],':apellidos' => $data['apellido']]);
            echo 'ok';
        }

        public function delete($id)
        {
            $query = $this->db->conectar()->prepare('DELETE FROM computer where matricula = :matricula');
            $query->execute([':matricula' => $id]);
            echo 'ok';
        }

        public function read()
        {
            require_once 'computerDTO.php';
            $query = "SELECT * FROM computer";
            $objComputadoras = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $computer = new ComputerDTO();
                $computer->id_computer = $value['id_computer'];
                $computer->name_computer = $value['name_computer'];
                $computer->price_computer = $value['price_computer'];
                $computer->model_computer = $value['model_computer'];
                $computer->color_computer = $value['color_computer'];
                $objComputadoras['data'][] = $computer;
            }
            echo json_encode($objComputadoras, JSON_UNESCAPED_UNICODE);
        }
    }
?>
