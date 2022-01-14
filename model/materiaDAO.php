<?php
    class MateriaDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO materia values (:id_materia, :nombre_materia, :grupo_materia, :alumnos_materia)');
            $query->execute([':id_materia'  => null, ':nombre_materia' => $data['nombreMateria'],':grupo_materia' => $data['grupoMateria'],':alumnos_materia' => $data['alumnosMateria']]);
            echo 'ok';
        }

        public function update($data)
        {
            $query = $this->db->conectar()->prepare('UPDATE materia SET  nombre_materia = :nombreMateriaActualizar, grupo_materia = :grupoMateriaActualizar, alumnos_materia = :alumnosMateriaActualizar WHERE id_materia = :idMateriaActualizar');
            $query->execute([':idMateriaActualizar' => $data['idMateriaActualizar'],':nombreMateriaActualizar' => $data['nombreMateriaActualizar'],':grupoMateriaActualizar' => $data['grupoMateriaActualizar'],':alumnosMateriaActualizar' => $data['alumnosMateriaActualizar']]);
            echo 'ok';
        }

        public function delete($id)
        {
            $query = $this->db->conectar()->prepare('DELETE FROM materia where id_materia = :idMateriaEliminar');
            $query->execute([':idMateriaEliminar' => $id]);
            echo 'ok';
        }

        public function read()
        {
            require_once 'materiaDTO.php';
            $query = "SELECT * FROM materia";
            $objMaterias = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $materia = new materiaDTO();
                $materia->id_materia = $value['id_materia'];
                $materia->nombre_materia = $value['nombre_materia'];
                $materia->grupo_materia = $value['grupo_materia'];
                $materia->alumnos_materia = $value['alumnos_materia'];
                $objMaterias['data'][] = $materia;
            }
            echo json_encode($objMaterias, JSON_UNESCAPED_UNICODE);
        }
    }
?>
