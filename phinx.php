<?php

require 'public/index.php';

$container = $app->getContainer();

// for the migrations
$migrations = [];
foreach ($modules as $module){
    $migrations[] = $module::MIGRATIONS;
}

// for the seeds
$seeds = [];
foreach ($modules as $module){
    $seeds[] = $module::SEEDS;
}

// DEFAULT PATHS
$DEFAULT_PATH_MIGRATIONS = '%%PHINX_CONFIG_DIR%%/database/migrations';
$DEFAULT_PATH_SEEDS = '%%PHINX_CONFIG_DIR%%/database/seeds';

return
[
    'paths' => [
        'migrations' => $migrations,
        'seeds' => $seeds
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
