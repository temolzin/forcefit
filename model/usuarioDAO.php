<?php
class UsuarioDAO extends Model implements CRUD
{
    const roleManager = 2;
    const CUSTOMER_INACTIVE = 0;

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $insertData = array(
            ':nombreUsuario' => $data['nombreUsuario'],
            ':apellidoPaternoUsuario' => $data['apellidoPaternoUsuario'],
            ':apellidoMaternoUsuario' => $data['apellidoMaternoUsuario'],
            ':emailUsuario' => $data['correoUsuario'],
            ':passwordUsuario' => $data['password'],
            ':imagen' => $data['imagen'],
            ':calleUsuario' => $data['calleUsuario'],
            ':estadoUsuario' => $data['estadoUsuario'],
            ':municipioUsuario' => $data['municipioUsuario'],
            ':coloniaUsuario' => $data['coloniaUsuario'],
            ':codigoPostalUsuario' => $data['codigoPostalUsuario'],
            ':id_rol' => $data['rolUsuario'],
            ':is_active' => self::CUSTOMER_INACTIVE,
            ':telefonoUsuario' => $data['telefonoUsuario'],
            ':isEmailNotified' => false
        );
        $query ="INSERT INTO usuario values (NULL, 
                :nombreUsuario,
                :apellidoPaternoUsuario,
                :apellidoMaternoUsuario,
                :emailUsuario,
                :passwordUsuario,
                :imagen,
                :calleUsuario,
                :estadoUsuario,
                :municipioUsuario,
                :coloniaUsuario,
                :codigoPostalUsuario,
                :id_rol,
                :is_active,
                :telefonoUsuario,
                :isEmailNotified)";
        
        if ($this->db->ejecutarAccion($query, $insertData)) {
            return $this->db->getLastInsertId();
        }
    }

    public function insertGymAndPlanSistema($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO usuario_gimnasio
            (id_usuario, id_gimnasio, id_plan_sistema, fecha_inicio, fecha_termino, estatus)
            VALUES
            (:id_usuario, :id_gimnasio, :id_plan_sistema, NOW(), NULL, NULL)');
        $query->execute([
            ':id_usuario' => $data['id_usuario'],
            ':id_gimnasio' => $data['id_gimnasio'],
            ':id_plan_sistema' => $data['id_plan_sistema'],
        ]);
        echo 'ok';
    }

    public function update($data)
    {
        $arrayActualizar = [
            ':id_usuario' => $data['id_usuario'],
            ':nombreUsuario' => $data['nombreUsuario'],
            ':apellidoPaternoUsuario' => $data['apellidoPaternoUsuario'],
            ':apellidoMaternoUsuario' => $data['apellidoMaternoUsuario'],
            ':telefonoUsuario' => $data['telefonoUsuario'],
            ':emailUsuario' => $data['emailUsuario'],
            ':passwordUsuario' => $data['passwordUsuario'],
            ':calleUsuario' => $data['calleUsuario'],
            ':estadoUsuario' => $data['estadoUsuario'],
            ':municipioUsuario' => $data['municipioUsuario'],
            ':coloniaUsuario' => $data['coloniaUsuario'],
            ':codigoPostalUsuario' => $data['codigoPostalUsuario'],
            ':id_rol' => $data['id_rol']
        ];
        $query = $this->db->conectar()->prepare('UPDATE usuario SET 
            nombreUsuario = :nombreUsuario,  
            apellidoPaternoUsuario = :apellidoPaternoUsuario,
            apellidoMaternoUsuario = :apellidoMaternoUsuario,
            telefonoUsuario = :telefonoUsuario,
            emailUsuario = :emailUsuario,
            passwordUsuario = :passwordUsuario,
            calleUsuario = :calleUsuario,
            estadoUsuario = :estadoUsuario,
            municipioUsuario = :municipioUsuario,
            coloniaUsuario = :coloniaUsuario,
            codigoPostalUsuario = :codigoPostalUsuario,
            id_rol = :id_rol
            WHERE id_usuario = :id_usuario');

        $query->execute($arrayActualizar);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM usuario where id_usuario = :id_usuario');
        $query->execute([':id_usuario' => $id]);
        echo 'ok';
    }

    public function read()
    {
        require_once 'usuarioDTO.php';
        $query = "SELECT
        u.id_usuario AS 'ID',
        u.id_rol,
        u.nombreUsuario,
        u.apellidoPaternoUsuario,
        u.apellidoMaternoUsuario,
        u.telefonoUsuario,
        u.emailUsuario,
        u.passwordUsuario,
        u.imagen,
        u.calleUsuario,
        u.estadoUsuario,
        u.municipioUsuario,
        u.coloniaUsuario,
        u.codigoPostalUsuario,
        r.nombreRol AS 'Rol',
        CASE
            WHEN r.nombreRol = 'Administrador' THEN 'No aplica'
            WHEN ug.id_gimnasio IS NULL THEN 'Aun no se le asigna'
            ELSE g.nombre_gimnasio
        END AS nombreGimnasio,
        CASE
            WHEN r.nombreRol = 'Administrador' THEN 'No aplica'
            WHEN ug.id_plan_sistema IS NULL THEN 'Aun no se le asigna'
            ELSE ps.nombre_plan_sistema
        END AS nombrePlanSistema,
        CASE
        WHEN (SELECT MIN(pps.vencimiento) FROM pago_plan_sistema pps WHERE pps.id_usuario = u.id_usuario AND pps.vencimiento > CURDATE()) IS NOT NULL THEN 1 ELSE 0
        END AS is_active
    FROM usuario u
    LEFT JOIN usuario_gimnasio ug ON u.id_usuario = ug.id_usuario
    LEFT JOIN gimnasio g ON ug.id_gimnasio = g.id_gimnasio
    LEFT JOIN plan_sistema ps ON ug.id_plan_sistema = ps.id_plan_sistema
    JOIN rol r ON u.id_rol = r.id_rol";

        $objUsuario = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
        foreach ($this->db->consultar($query) as $key => $value) {
            $usuario = new UsuarioDTO();
            $usuario->id_usuario = $value['ID'];
            $usuario->id_rol = $value['id_rol'];
            $usuario->nombreUsuario = $value['nombreUsuario'];
            $usuario->apellidoPaternoUsuario = $value['apellidoPaternoUsuario'];
            $usuario->apellidoMaternoUsuario = $value['apellidoMaternoUsuario'];
            $usuario->telefonoUsuario = $value['telefonoUsuario'];
            $usuario->emailUsuario = $value['emailUsuario'];
            $usuario->passwordUsuario = $value['passwordUsuario'];
            $usuario->imagen = $value['imagen'];
            $usuario->calleUsuario = $value['calleUsuario'];
            $usuario->estadoUsuario = $value['estadoUsuario'];
            $usuario->municipioUsuario = $value['municipioUsuario'];
            $usuario->coloniaUsuario = $value['coloniaUsuario'];
            $usuario->codigoPostalUsuario = $value['codigoPostalUsuario'];
            $usuario->nombreRol = $value['Rol'];
            $usuario-> nombre_gimnasio= $value['nombreGimnasio'];
            $usuario->nombre_plan_sistema = $value['nombrePlanSistema'];
            $usuario->is_active = $value['is_active'];
            array_push($objUsuario, $usuario);
        }
        }

        $objUsuario = array_values($objUsuario);
        return $objUsuario;
    }

    public function login($data)
    {
        require_once 'usuarioDTO.php';
        $query = $this->db->consultar("SELECT u.id_usuario, u.nombreUsuario, u.apellidoPaternoUsuario, u.apellidoMaternoUsuario, u.emailUsuario, u.passwordUsuario, u.imagen, u.calleUsuario, u.estadoUsuario, u.municipioUsuario, u.coloniaUsuario, u.codigoPostalUsuario, u.id_rol, ug.id_gimnasio,
        (CASE WHEN u.id_rol = 2 AND EXISTS
            (SELECT 1 FROM pago_plan_sistema pps WHERE pps.id_usuario = u.id_usuario AND pps.vencimiento > CURDATE()) THEN 1 ELSE 0
        END) as is_active
        FROM usuario AS u
        LEFT JOIN usuario_gimnasio AS ug ON u.id_usuario = ug.id_usuario
        WHERE u.emailUsuario = '" . $data['emailUsuario'] . "' AND u.passwordUsuario ='" . $data['passwordUsuario'] . "'");
        if ($query !== null) {
            if ($query[0]['is_active'] === 0 && $query[0]['id_rol'] === 2) {
                echo json_encode(array("warning" => true));
                return;
            }
            session_start();
            $_SESSION['id_usuario'] = $query[0]['id_usuario'];
            $_SESSION['id_gimnasio'] = $query[0]['id_gimnasio'];
            $_SESSION['nombreUsuario'] = $query[0]['nombreUsuario'];
            $_SESSION['apellidoPaternoUsuario'] = $query[0]['apellidoPaternoUsuario'];
            $_SESSION['apellidoMaternoUsuario'] = $query[0]['apellidoMaternoUsuario'];
            $_SESSION['emailUsuario'] = $query[0]['emailUsuario'];
            $_SESSION['passwordUsuario'] = $query[0]['passwordUsuario'];
            $_SESSION['imagen'] = $query[0]['imagen'];
            $_SESSION['calleUsuario'] = $query[0]['calleUsuario'];
            $_SESSION['estadoUsuario'] = $query[0]['estadoUsuario'];
            $_SESSION['municipioUsuario'] = $query[0]['municipioUsuario'];
            $_SESSION['coloniaUsuario'] = $query[0]['coloniaUsuario'];
            $_SESSION['codigoPostalUsuario'] = $query[0]['codigoPostalUsuario'];
            $_SESSION['id_rol'] = $query[0]['id_rol'];
            $_SESSION['login'] = true;
            $_SESSION['permisos'] = $this->getPermisos($query[0]['id_rol']);
            echo json_encode(array("success" => true));
            return;
        }
        echo json_encode(array("error" => "Usuario y Contraseña incorrectos"));
    }
    
    public function getPermisos($idrol)
    {
        require_once 'permisoDTO.php';
        $query = "SELECT p.id_rol, p.id_modulo, m.nombre_modulo AS modulo, m.icono, p.c, p.r, p.u, p.d, s.id_submodulo, s.nombre_submodulo AS submodulo, s.icono AS subicono
        FROM permiso p
        INNER JOIN modulo m ON p.id_modulo = m.id_modulo
        LEFT JOIN submodulo s ON s.id_modulo = m.id_modulo WHERE p.id_rol = " . $idrol . " ORDER BY m.posicion";
        $sql = $this->db->consultar($query);
        $arrPermisos = array();
        for ($i = 0; $i < count($sql); $i++) {
            $moduloId = $sql[$i]['id_modulo'];
            if (!isset($arrPermisos[$moduloId])) {
                $arrPermisos[$moduloId] = array(
                    'modulo' => $sql[$i]['modulo'],
                    'c' => $sql[$i]['c'],
                    'r' => $sql[$i]['r'],
                    'u' => $sql[$i]['u'],
                    'd' => $sql[$i]['d'],
                    'icono' => $sql[$i]['icono'],
                    'submodulos' => array()
                );
            }
            if ($sql[$i]['id_submodulo'] !== null) {
                $arrPermisos[$moduloId]['submodulos'][] = array(
                    'submodulo' => $sql[$i]['submodulo'],
                    'subicono' => $sql[$i]['subicono']
                );
            }
        }
        return $arrPermisos;
    }

    public function readUserManagersGym()
    {
        require_once 'usuarioDTO.php';
        $query = "SELECT usuario.id_usuario, usuario.nombreUsuario, usuario.apellidoPaternoUsuario, usuario.apellidoMaternoUsuario
        FROM usuario
        INNER JOIN rol ON usuario.id_rol = rol.id_rol
        WHERE rol.id_rol = " . self::roleManager;
        $objUsuario = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $usuario = new UsuarioDTO();
                $usuario->id_usuario = $value['id_usuario'];
                $usuario->nombreUsuario = $value['nombreUsuario'];
                $usuario->apellidoPaternoUsuario = $value['apellidoPaternoUsuario'];
                $usuario->apellidoMaternoUsuario = $value['apellidoMaternoUsuario'];
                array_push($objUsuario, $usuario);
            }
        }else{
            $objUsuario=null;
        }
        return $objUsuario;
    }

    public function updateImage($data)
    {
        $insertData = array(
            ':id_user' => $data['id_user'],
            ':imagen' => $data['imageInput'],
        );

        $queryUpdateUser = "UPDATE usuario SET 
        imagen = :imagen
        WHERE id_usuario = :id_user";

        if ($this->db->ejecutarAccion($queryUpdateUser, $insertData)) {
            echo "ok";
        }
    }

    public function getUsersWithUpcomingMembershipExpiry()
    {
        $objCliente = array();
        require_once 'clienteDTO.php';
        $query = "SELECT u.*, pps.vencimiento, ps.nombre_plan_sistema
        FROM usuario as u
        INNER JOIN pago_plan_sistema as pps ON u.id_usuario = pps.id_usuario
        INNER JOIN plan_sistema as ps ON pps.id_plan_sistema = ps.id_plan_sistema
        WHERE pps.vencimiento BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 5 DAY)";
        $objCliente=null;
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $cliente = new ClienteDTO();
                $cliente->imagen_cliente = $value['imagen'];
                $cliente->id_cliente = $value['id_usuario'];
                $cliente->nombre_cliente = $value['nombreUsuario'];
                $cliente->apellido_paterno_cliente = $value['apellidoPaternoUsuario'];
                $cliente->apellido_materno_cliente = $value['apellidoMaternoUsuario'];
                $cliente->numero_cliente = $value['telefonoUsuario'];
                $cliente->nombrePlanGym = $value['nombre_plan_sistema'];
                $cliente->fecha_vencimiento = $value['vencimiento'];
                $cliente->email_customer = $value['emailUsuario'];
                $cliente->is_email_notified = $value['isEmailNotified'];
                $objCliente[$cliente->id_cliente] = $cliente;
            }
        }

        $objCliente = array_values($objCliente);
        return $objCliente;
    }
}
?>
