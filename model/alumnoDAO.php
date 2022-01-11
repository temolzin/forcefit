<?php
    class AlumnoDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO alumno values (:id_alumno, :nombre_alumno, :apellidos_alumno)');
            $query->execute([':id_alumno' => null, ':nombre_alumno' => $data['nombreAlumno'],':apellidos_alumno' => $data['apellidosAlumno']]);
            echo 'ok';
        }

        public function update($data)
        {
            $query = $this->db->conectar()->prepare('UPDATE alumno SET  nombre_alumno = :nombre_alumno, apellidos_alumno = :apellidos_alumno WHERE id_alumno = :id_alumno');
            $query->execute([':id_alumno' => $data['idAlumno'],':nombre_alumno' => $data['nombreAlumno'],':apellidos_alumno' => $data['apellidosAlumno']]);
            echo 'ok';
        }

        public function delete($id)
        {
            $query = $this->db->conectar()->prepare('DELETE FROM alumno where id_alumno = :id_alumno');
            $query->execute([':id_alumno' => $id]);
            echo 'ok';
        }

        public function read()
        {
            require_once 'alumnoDTO.php';
            $query = "SELECT * FROM alumno";
            $objAlumnos = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $alumno = new AlumnoDTO();
                $alumno->id_alumno = $value['id_alumno'];
                $alumno->nombre_alumno = $value['nombre_alumno'];
                $alumno->apellidos_alumno = $value['apellidos_alumno'];
                $objAlumnos['data'][] = $alumno;
            }
            echo json_encode($objAlumnos, JSON_UNESCAPED_UNICODE);
        }
    }
?>
