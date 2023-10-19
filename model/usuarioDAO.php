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
        $query = $this->db->conectar()->prepare('INSERT INTO usuario values (NULL, 
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
                :is_active)');
        $query->execute([
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
            ':is_active' => self::CUSTOMER_INACTIVE
        ]);
        echo 'ok';
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
        $imagen = '';
        $arrayActualizar = [];
        if (isset($data['imagen'])) {
            $imagen = 'imagen = :imagen,';
            $arrayActualizar = [
                ':id_usuario' => $data['id_usuario'],
                ':nombreUsuario' => $data['nombreUsuario'],
                ':apellidoPaternoUsuario' => $data['apellidoPaternoUsuario'],
                ':apellidoMaternoUsuario' => $data['apellidoMaternoUsuario'],
                ':emailUsuario' => $data['emailUsuario'],
                ':passwordUsuario' => $data['passwordUsuario'],
                ':imagen' => $data['imagen'],
                ':calleUsuario' => $data['calleUsuario'],
                ':estadoUsuario' => $data['estadoUsuario'],
                ':municipioUsuario' => $data['municipioUsuario'],
                ':coloniaUsuario' => $data['coloniaUsuario'],
                ':codigoPostalUsuario' => $data['codigoPostalUsuario'],
                ':id_rol' => $data['id_rol']
            ];
        } else {
            $arrayActualizar = [
                ':id_usuario' => $data['id_usuario'],
                ':nombreUsuario' => $data['nombreUsuario'],
                ':apellidoPaternoUsuario' => $data['apellidoPaternoUsuario'],
                ':apellidoMaternoUsuario' => $data['apellidoMaternoUsuario'],
                ':emailUsuario' => $data['emailUsuario'],
                ':passwordUsuario' => $data['passwordUsuario'],
                ':imagen' => $data['imagen'],
                ':calleUsuario' => $data['calleUsuario'],
                ':estadoUsuario' => $data['estadoUsuario'],
                ':municipioUsuario' => $data['municipioUsuario'],
                ':coloniaUsuario' => $data['coloniaUsuario'],
                ':codigoPostalUsuario' => $data['codigoPostalUsuario'],
                ':id_rol' => $data['id_rol']
            ];
        }
        $query = $this->db->conectar()->prepare('UPDATE usuario SET 
            ' . $imagen . '
            nombreUsuario = :nombreUsuario,  
            apellidoPaternoUsuario = :apellidoPaternoUsuario,
            apellidoMaternoUsuario = :apellidoMaternoUsuario,
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
        u.nombreUsuario,
        u.apellidoPaternoUsuario,
        u.apellidoMaternoUsuario,
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
        foreach ($this->db->consultar($query) as $key => $value) {
            $usuario = new UsuarioDTO();
            $usuario->id_usuario = $value['ID'];
            $usuario->nombreUsuario = $value['nombreUsuario'];
            $usuario->apellidoPaternoUsuario = $value['apellidoPaternoUsuario'];
            $usuario->apellidoMaternoUsuario = $value['apellidoMaternoUsuario'];
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
        session_start();
        if ($query != null) {
            foreach ($query as $key => $value) {
                $_SESSION['id_usuario'] = $value['id_usuario'];
                $_SESSION['id_gimnasio'] = $value['id_gimnasio'];
                $_SESSION['nombreUsuario'] = $value['nombreUsuario'];
                $_SESSION['apellidoPaternoUsuario'] = $value['apellidoPaternoUsuario'];
                $_SESSION['apellidoMaternoUsuario'] = $value['apellidoMaternoUsuario'];
                $_SESSION['emailUsuario'] = $value['emailUsuario'];
                $_SESSION['passwordUsuario'] = $value['passwordUsuario'];
                $_SESSION['imagen'] = $value['imagen'];
                $_SESSION['calleUsuario'] = $value['calleUsuario'];
                $_SESSION['estadoUsuario'] = $value['estadoUsuario'];
                $_SESSION['municipioUsuario'] = $value['municipioUsuario'];
                $_SESSION['coloniaUsuario'] = $value['coloniaUsuario'];
                $_SESSION['codigoPostalUsuario'] = $value['codigoPostalUsuario'];
                $_SESSION['id_rol'] = $value['id_rol'];
                $_SESSION['login'] = true;
                $_SESSION['permisos'] = $this->getPermisos($value['id_rol']);
                if ($value['is_active'] === 0 && $value['id_rol'] === 2) {
                    echo json_encode(array("warning" => true));
                    exit;
                } else {
                    echo json_encode(array("success" => true));
                    exit;
                }
            }
        } else {
            echo json_encode(array("error" => "Usuario y Contraseña incorrectos"));
        }
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
}
?>
