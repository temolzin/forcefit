<?php
class ValidatePermissionModule
{
    public static function invoke($modulo)
    {
        foreach ($_SESSION['permisos'] as $permission) {
            if ($permission['modulo'] === $modulo && $permission['r'] === 1) {
                return true;
            }
        }
        return false;
    }
}
?>
