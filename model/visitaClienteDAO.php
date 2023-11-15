<?php
class VisitaClienteDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $insertData = array(
            ':id_visita' => null,
            ':id_cliente' => $data['id_cliente'],
            ':id_gimnasio' => $data['id_gimnasio']
        );

        $query = "INSERT INTO visita_cliente VALUES (:id_visita, :id_cliente, :id_gimnasio, CURDATE(), CURTIME(), NULL)";

        if ($this->db->ejecutarAccion($query, $insertData)) {
            echo "ok";
        }
    }

    public function updateExit($idCliente)
    {
        $queryGetIdVisit = "SELECT MAX(id_visita) FROM visita_cliente WHERE id_cliente = " . $idCliente;

        $idVisit = $this->db->consultar($queryGetIdVisit);

        $queryUpdateExitClient = "UPDATE visita_cliente
        SET hora_salida = CURTIME()
        WHERE id_visita = :idVisit";

        $insertData = array(
            ':idVisit' => $idVisit[0][0]
        );

        if ($this->db->ejecutarAccion($queryUpdateExitClient, $insertData)) {
            echo "ok";
        }
    }

    public function update($data)
    {
        $insertData = array(
            ':id_visita' => $data['id_visita'],
            ':id_cliente' => $data['id_cliente'],
            ':fecha' => $data['fecha'],
            ':hora_entrada' => $data['hora_entrada'],
            ':hora_salida' => $data['hora_salida']
        );

        $query = "UPDATE visita_cliente SET  
            id_cliente = :id_cliente, 
            fecha = :fecha, 
            hora_entrada = :hora_entrada, 
            hora_salida = :hora_salida 
            WHERE id_visita = :id_visita";
        
        if ($this->db->ejecutarAccion($query, $insertData)) {
            echo "ok";
        }
    }

    public function delete($id)
    {
        $insertData = array(':id_visita' => $id);
        $query = "DELETE FROM visita_cliente where id_visita = :id_visita";
        
        if ($this->db->ejecutarAccion($query, $insertData)) {
            echo "ok";
        }
    }

    public function read()
    {
    }

    public function readVisits($id_gimnasio)
    {
        require_once 'visitaClienteDTO.php';
        $query = "SELECT esc.*, c.*
        FROM visita_cliente AS esc
        INNER JOIN cliente AS c ON esc.id_cliente = c.id_cliente
        WHERE esc.id_gimnasio = $id_gimnasio";
        $objVisita = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
        foreach ($this->db->consultar($query) as $key => $value) {
            $visita = new VisitaClienteDTO();
            $visita->id_visit = $value['id_visita'];
            $visita->id_client = $value['id_cliente'];
            $visita->name_client = $value['nombre_cliente'] . ' ' . $value['apellido_paterno_cliente'] . ' ' . $value['apellido_materno_cliente'];
            $visita->date = $value['fecha'];
            $visita->hour_entry = $value['hora_entrada'];
            $visita->hour_exit = $value['hora_salida'];
            $visita->image_client = $value['id_cliente'] . '/' . $value['imagen_cliente'];
            $objVisita[$visita->id_visit] = $visita;
        }
        }

        $objVisita = array_values($objVisita);
        return $objVisita;
    }

    public function getClientsByGym($id_gimnasio)
    {
        $query = "
        SELECT id_cliente, nombre_cliente, apellido_paterno_cliente, apellido_materno_cliente
        FROM cliente 
        WHERE id_gimnasio =" . $id_gimnasio;

        $result = $this->db->consultar($query);
        return $result;
    }

    public function getClientsInGym($id_gimnasio)
    {
        $query = "
        SELECT c.id_cliente, c.nombre_cliente, c.apellido_paterno_cliente, c.apellido_materno_cliente
        FROM visita_cliente esc
        INNER JOIN cliente c ON esc.id_cliente = c.id_cliente
        WHERE c.id_gimnasio = " . $id_gimnasio . " AND hora_salida IS null
        ";
        $result = $this->db->consultar($query);
        return $result;
    }
}
