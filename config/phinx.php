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
            "host" => $env['HOST'],
            "name" => $env['DB'],
            "user" => $env['USER'],
            "pass" => $env['PASSWORD'],
            "port" => $env['PORT'],
            "charset" => $env['CHARSET'],
            
        ],
    ],
    'version_order' => 'creation'
];
