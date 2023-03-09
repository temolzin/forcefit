<?php
class UsuarioDAO extends Model implements CRUD
{
    public function login($username, $password)
    {

        $query = $this->db->consultar("SELECT * FROM usuario  WHERE email = '" . $username . "' and password = '" . $password . "'");
        $objUsuarios = array();
        $rows = count($query);

        if ($rows <= 0) {
            echo 'error';
            return;
        } else {
            echo 'ok';
            return;
        }

        require 'usuarioDTO.php';
        $usuario = new UsuarioDTO();
        $usuario->nombre = $query[0]['nombre'];
        $usuario->apellido_paterno = $query[0]['apellido_paterno'];
        $usuario->apellido_materno = $query[0]['apellido_materno'];
        $objUsuarios['data'][] = $usuario;

        echo json_encode($objUsuarios, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param mixed $data
     * @return mixed
     */
    public function insert($data)
    {
    }

    /**
     *
     * @param mixed $data
     * @return mixed
     */
    public function update($data)
    {
    }

    /**
     *
     * @param mixed $id
     * @return mixed
     */
    public function delete($id)
    {
    }

    /**
     * @return mixed
     */
    public function read()
    {
    }
}
