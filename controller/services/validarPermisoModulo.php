<?php
class ValidarPermisoModulo
{
	function validatePermissionAccessModule($modulo)
	{
		session_start();
		foreach ($_SESSION['permisos'] as $permission) {
            if ($permission['modulo'] === $modulo && $permission['r'] === 1) {
                return true;
            }
        }
        return false;
	}
}
?>

