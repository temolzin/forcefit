<?php
$env = parse_ini_file('./.env');

if ($env === false) {
    die("No se puede cargar el archivo .env");
}

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_environment' => 'default',
        'default' => [
            "adapter" => "mysql",
            "host" => $env['DB_HOST'],
            "name" => $env['DB_NAME'],
            "user" => $env['DB_USER'],
            "pass" => $env['DB_PASSWORD'],
            "port" => $env['DB_PORT'],
            "charset" => $env['DB_CHARSET'],
            
        ],
    ],
    'version_order' => 'creation'
];
