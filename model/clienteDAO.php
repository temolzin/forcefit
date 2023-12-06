<?php
class ClienteDAO extends Model implements CRUD
{
    const CUSTOMER_INACTIVE = 0;
    const NOTIFICATION_NOT_SENT = 0;

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $insertData = array(
            ':id_gimnasio'=> $data['id_gimnasio'],
            ':id_planGym' =>$data['id_PlanGym'],
            ':nombre_cliente' => $data['nombreCliente'],
            ':apellido_paterno_cliente' => $data['apellidoPaternoCliente'],
            ':apellido_materno_cliente' => $data['apellidoMaternoCliente'],
            ':municipio_cliente' => $data['municipioCliente'],
            ':colonia_cliente' => $data['coloniaCliente'],
            ':calle_cliente' => $data['calleCliente'],
            ':codigo_postal_cliente' => $data['codigoPostalCliente'],
            ':numero_cliente' => $data['numeroCliente'],
            ':imagen_cliente' => $data['imagen'],
            ':email_cliente' => $data['emailCliente'],
            ':is_email_notified' => self::NOTIFICATION_NOT_SENT,
            ':is_active' => self::CUSTOMER_INACTIVE
        );
        $query ="INSERT INTO cliente values (NULL,
                :id_gimnasio,
                :id_planGym,
                :nombre_cliente, 
                :apellido_paterno_cliente, 
                :apellido_materno_cliente, 
                :municipio_cliente, 
                :colonia_cliente, 
                :calle_cliente, 
                :codigo_postal_cliente, 
                :numero_cliente, 
                :imagen_cliente,
                :email_cliente,
                :is_email_notified,
                :is_active)";
        if ($this->db->ejecutarAccion($query, $insertData)) {
            return $this->db->getLastInsertId();
        }
    }

    public function update($data)
    {
        $arrayActualizar = [
            ':id_cliente' => $data['id_cliente'],
            ':id_planGym' => $data['id_planGym'],
            ':nombre_cliente' => $data['nombre_cliente'],
            ':apellido_paterno_cliente' => $data['apellido_paterno_cliente'],
            ':apellido_materno_cliente' => $data['apellido_materno_cliente'],
            ':municipio_cliente' => $data['municipio_cliente'],
            ':colonia_cliente' => $data['colonia_cliente'],
            ':calle_cliente' => $data['calle_cliente'],
            ':codigo_postal_cliente' => $data['codigo_postal_cliente'],
            ':numero_cliente' => $data['numero_cliente'],
            ':email_cliente' => $data['email_cliente']
        ];
        $query = $this->db->conectar()->prepare('UPDATE cliente SET 
            nombre_cliente = :nombre_cliente,
            id_planGym = :id_planGym,
            apellido_paterno_cliente = :apellido_paterno_cliente,
            apellido_materno_cliente = :apellido_materno_cliente,
            municipio_cliente = :municipio_cliente,
            colonia_cliente = :colonia_cliente,
            calle_cliente = :calle_cliente,
            codigo_postal_cliente = :codigo_postal_cliente,
            numero_cliente = :numero_cliente,
            email_cliente = :email_cliente
            WHERE id_cliente = :id_cliente');

        $query->execute($arrayActualizar);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM cliente where id_cliente = :id_cliente');
        $query->execute([':id_cliente' => $id]);
        echo 'ok';
    }

    public function read()
    {
        require_once 'clienteDTO.php';
        $query = "SELECT * FROM cliente";
        $objCliente = array();
        foreach ($this->db->consultar($query) as $key => $value) {
            $cliente = new ClienteDTO();
            $cliente->id_cliente = $value['id_cliente'];
            $cliente->nombre_cliente = $value['nombre_cliente'];
            $cliente->apellido_paterno_cliente = $value['apellido_paterno_cliente'];
            $cliente->apellido_materno_cliente = $value['apellido_materno_cliente'];
            $cliente->municipio_cliente = $value['municipio_cliente'];
            $cliente->colonia_cliente = $value['colonia_cliente'];
            $cliente->calle_cliente = $value['calle_cliente'];
            $cliente->codigo_postal_cliente = $value['codigo_postal_cliente'];
            $cliente->numero_cliente = $value['numero_cliente'];
            $cliente->email_customer = $value['email_cliente'];
            $cliente->imagen_cliente = $value['imagen_cliente'];
            array_push($objCliente, $cliente);
        }
        return $objCliente;
    }


    public function readDataByIdUsuario($id_usuario)
    {
        require_once 'clienteDTO.php';
        $query = "SELECT c.*, pg.nombrePlanGym,
            (CASE
            WHEN (SELECT MIN(ppgc.vencimiento) FROM pago_plan_gym_cliente ppgc WHERE ppgc.id_cliente = c.id_cliente AND ppgc.vencimiento > CURDATE()) IS NOT NULL THEN 1 ELSE 0
            END) as is_active
            FROM cliente AS c
            INNER JOIN usuario_gimnasio AS ug ON c.id_gimnasio = ug.id_gimnasio
            INNER JOIN plan_gym AS pg ON c.id_planGym = pg.id_planGym
            WHERE ug.id_usuario = " . $id_usuario;
        $objCliente = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
        foreach ($this->db->consultar($query) as $key => $value) {
            $cliente = new ClienteDTO();
            $cliente->id_cliente = $value['id_cliente'];
            $cliente->id_planGym = $value['id_planGym'];
            $cliente->nombrePlanGym = $value['nombrePlanGym'];
            $cliente->nombre_cliente = $value['nombre_cliente'];
            $cliente->apellido_paterno_cliente = $value['apellido_paterno_cliente'];
            $cliente->apellido_materno_cliente = $value['apellido_materno_cliente'];
            $cliente->municipio_cliente = $value['municipio_cliente'];
            $cliente->colonia_cliente = $value['colonia_cliente'];
            $cliente->calle_cliente = $value['calle_cliente'];
            $cliente->codigo_postal_cliente = $value['codigo_postal_cliente'];
            $cliente->numero_cliente = $value['numero_cliente'];
            $cliente->email_customer = $value['email_cliente'];
            $cliente->imagen_cliente = $value['imagen_cliente'];
            $cliente->is_active = $value['is_active'];
            array_push($objCliente, $cliente);
        }
        }
        return $objCliente;
    }

    public function readFullDataById(&$cliente, $id_cliente)
    {
        $query = $this->db->conectar()->prepare("SELECT c.id_cliente, g.id_gimnasio, c.nombre_cliente, c.apellido_paterno_cliente, c.apellido_materno_cliente, c.municipio_cliente, c.colonia_cliente, c.calle_cliente, c.codigo_postal_cliente, c.numero_cliente, c.email_cliente, c.imagen_cliente, g.nombre_gimnasio, g.telefono, g.imagen, g.fondoCredencial
        FROM cliente AS c INNER JOIN gimnasio g ON c.id_gimnasio = g.id_gimnasio WHERE c.id_cliente =:id_cliente");

        $query->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $query->execute();

        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        $cliente = $resultados[0];
    }

    public function readClientes($id_usuario)
    {
        require_once 'clienteDTO.php';
        $query = "SELECT c.id_cliente, c.nombre_cliente, c.apellido_paterno_cliente,apellido_materno_cliente FROM cliente AS c
        INNER JOIN usuario_gimnasio AS ug ON c.id_gimnasio = ug.id_gimnasio
        WHERE ug.id_usuario = ".$id_usuario." ";
        $objCliente = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $cliente = new ClienteDTO();
                $cliente->id_cliente = $value['id_cliente'];
                $cliente->nombre_cliente = $value['nombre_cliente'];
                $cliente->apellido_paterno_cliente = $value['apellido_paterno_cliente'];
                $cliente->apellido_materno_cliente = $value['apellido_materno_cliente'];
                array_push($objCliente, $cliente);
            }
        }else{
            $objCliente=null;
        }
        return $objCliente;
    }

    public function getCustomersWithUpcomingMembershipExpiry($id_gimnasio)
    {
        $objCliente = array();
        require_once 'clienteDTO.php';
        $query = "SELECT DISTINCT c.*, pg.nombrePlanGym, ppg.vencimiento
        FROM cliente AS c
        INNER JOIN plan_gym AS pg ON c.id_planGym = pg.id_planGym
        INNER JOIN pago_plan_gym_cliente AS ppg ON c.id_cliente = ppg.id_cliente
        WHERE ppg.vencimiento BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 5 DAY)
        AND ppg.id_planGym IN (SELECT id_planGym FROM plan_gym WHERE id_gimnasio = $id_gimnasio)
        AND c.id_cliente NOT IN (
            SELECT id_cliente
            FROM pago_plan_gym_cliente
            WHERE vencimiento > DATE_ADD(CURDATE(), INTERVAL 5 DAY)
        )";
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $cliente = new ClienteDTO();
                $cliente->id_cliente = $value['id_cliente'];
                $cliente->nombrePlanGym = $value['nombrePlanGym'];
                $cliente->nombre_cliente = $value['nombre_cliente'];
                $cliente->apellido_paterno_cliente = $value['apellido_paterno_cliente'];
                $cliente->apellido_materno_cliente = $value['apellido_materno_cliente'];
                $cliente->municipio_cliente = $value['municipio_cliente'];
                $cliente->colonia_cliente = $value['colonia_cliente'];
                $cliente->calle_cliente = $value['calle_cliente'];
                $cliente->codigo_postal_cliente = $value['codigo_postal_cliente'];
                $cliente->numero_cliente = $value['numero_cliente'];
                $cliente->email_customer = $value['email_cliente'];
                $cliente->imagen_cliente = $value['imagen_cliente'];
                $cliente->fecha_vencimiento = $value['vencimiento'];
                $cliente->is_email_notified = $value['is_email_notified'];
                $objCliente[$cliente->id_cliente] = $cliente;
            }
        }

        $objCliente = array_values($objCliente);
        return $objCliente;
    }

    public function updateImage($data)
    {
        $insertData = array(
            ':id_cliente' => $data['id_cliente'],
            ':imagen_cliente' => $data['imageInput'],
        );

        $queryUpdateUser = "UPDATE cliente SET 
        imagen_cliente = :imagen_cliente
        WHERE id_cliente = :id_cliente";

        if ($this->db->ejecutarAccion($queryUpdateUser, $insertData)) {
            echo "ok";
        }
    }

}
?>

