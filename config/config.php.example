<?php
$env = parse_ini_file('./.env');

if ($env === false) {
    die("No se puede cargar el archivo .env");
}

define('URL', $env['URL']);
define('HOST', $env['DB_HOST']);
define('DB', $env['DB_NAME']);
define('USER', $env['DB_USER']);
define('PASSWORD', $env['DB_PASSWORD']);
define('CHARSET', $env['DB_CHARSET']);
?>
