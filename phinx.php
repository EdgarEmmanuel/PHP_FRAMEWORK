<?php

require 'public/index.php';

$container = $app->getContainer();
$migrations = [];
foreach ($modules as $module){
    $migrations[] = $module::MIGRATIONS;
}

$DEFAULT_PATH = '%%PHINX_CONFIG_DIR%%/database/migrations';

return
[
    'paths' => [
        'migrations' => $migrations,
        'seeds' => '%%PHINX_CONFIG_DIR%%/database/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'production',
        'production' => [
            'adapter' => $container->get('database.type'),
            'host' => $container->get('database.host'),
            'name' => $container->get('database.name'),
            'user' => $container->get('database.user'),
            'pass' => $container->get('database.password'),
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'development_db',
            'user' => 'root',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'testing_db',
            'user' => 'root',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
