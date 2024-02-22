<?php
class GimnasioDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $insertData = array(
            ':nombre_gimnasio' => $data['nombre_gimnasio'],
            ':telefono' => $data['telefono'],
            ':imagen' => $data['imagen'],
            ':fondoCredencial' => $data['fondoCredencial']
        );
        $query = "INSERT INTO gimnasio values (NULL, 
            :nombre_gimnasio,
            :telefono,  
            :imagen,
            :fondoCredencial)";
        if ($this->db->ejecutarAccion($query, $insertData)) {
            return $this->db->getLastInsertId();
        }
    }

    public function update($data)
    {
        $arrayActualizar = [
            ':id_gimnasio' => $data['id_gimnasio'],
            ':nombre_gimnasio' => $data['nombre_gimnasio'],
            ':telefono' => $data['telefono']
        ];
        $query = $this->db->conectar()->prepare('UPDATE gimnasio SET
            nombre_gimnasio = :nombre_gimnasio,  
            telefono = :telefono
            WHERE id_gimnasio = :id_gimnasio');

        $query->execute($arrayActualizar);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM gimnasio where id_gimnasio = :id_gimnasio');
        $query->execute([':id_gimnasio' => $id]);
        echo 'ok';
    }

    public function read()
    {
        require_once 'gimnasioDTO.php';
        $query = "SELECT * FROM gimnasio";
        $objGimnasio = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
        foreach ($this->db->consultar($query) as $key => $value) {
            $gimnasio = new GimnasioDTO();
            $gimnasio->id_gimnasio = $value['id_gimnasio'];
            $gimnasio->nombre_gimnasio = $value['nombre_gimnasio'];
            $gimnasio->telefono = $value['telefono'];
            $gimnasio->imagen = $value['imagen'];
            $gimnasio->fondoCredencial = $value['fondo_credencial'];
            array_push($objGimnasio, $gimnasio);
        }
        }
        $objGimnasio = array_values($objGimnasio);
        return $objGimnasio;
    }

    public function updateImage($data)
    {
        $insertData = array(
            ':id_gimnasio' => $data['id_gimnasio'],
            ':imageInput' => $data['imageInput'],
        );

        $queryUpdateUser = "UPDATE gimnasio SET 
        imagen = :imageInput
        WHERE id_gimnasio = :id_gimnasio";

        if ($this->db->ejecutarAccion($queryUpdateUser, $insertData)) {
            echo "ok";
        }
    }

    public function updateBackgroundCredential($data)
    {
        $insertData = array(
            ':id_gimnasio' => $data['id_gimnasio'],
            ':backgroundCredential' => $data['backgroundCredential'],
        );

        $queryUpdateUser = "UPDATE gimnasio SET 
        fondo_credencial = :backgroundCredential
        WHERE id_gimnasio = :id_gimnasio";

        if ($this->db->ejecutarAccion($queryUpdateUser, $insertData)) {
            echo "ok";
        }
    }

    public function getDataGymReport($id_usuario)
    {
        $query = "SELECT 
    g.nombre_gimnasio,
    YEAR(ppgc.fecha_hora_pago) AS ano,
    MONTH(ppgc.fecha_hora_pago) AS mes,
    SUM(ppgc.cantidad_pago) AS ingresos_mes,
    gi.imagen AS logo_gimnasio
    FROM 
        pago_plan_gym_cliente ppgc
    JOIN 
        plan_gym pg ON ppgc.id_plan_gym = pg.id_plan_gym
    JOIN 
        gimnasio g ON pg.id_gimnasio = g.id_gimnasio
    JOIN 
        gimnasio gi ON g.id_gimnasio = gi.id_gimnasio
    JOIN 
        usuario_gimnasio ug ON g.id_gimnasio = ug.id_gimnasio
    WHERE 
        ug.id_usuario = :id_usuario
    GROUP BY 
        g.nombre_gimnasio, YEAR(ppgc.fecha_hora_pago), MONTH(ppgc.fecha_hora_pago)
    ORDER BY 
        ano DESC, mes DESC;";

            $stmt = $this->db->conectar()->prepare($query);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();

            $reporteGanancias = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $reporteGanancias;
    }
}
?>

