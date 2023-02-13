<?php
class LoginDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function loginUser(string $usuario, string $password)
    {
        require_once 'loginDTO.php';
        $this->strEmail = $usuario;
        $this->strPassword = $password;
        $sql = "SELECT id_usuario,FROM usuario WHERE 
					email = '$this->strUsuario' and 
					password = '$this->strPassword'";
        $request = $this->select($sql);
        return $request;
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
?>