<?php

require dirname(__DIR__) . '/vendor/autoload.php';

//all modules
$modules = [
    \App\Blog\BlogModule::class
];

// database
$databaseConfig = dirname(__DIR__) . '/app/Config/DBConfig.php';

// dependency injection container
$builder = new \DI\ContainerBuilder();
//$builder->addDefinitions($databaseConfig);
foreach ($modules as $module){
    $builder->addDefinitions($module::DEFINITIONS);
    $builder->addDefinitions($module::DB_CONFIG);
}
$builder->addDefinitions(dirname(__DIR__).'/app/Config/Config.php');
$container = $builder->build();


$app = new \Framework\App($container,$modules);

$THE_INTERFACE_USED = php_sapi_name();



if($THE_INTERFACE_USED != 'cli'){
    // requests and responses
    $REQUEST = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();
    $RESPONSE = $app->run($REQUEST);
    \Http\Response\send($RESPONSE);
}
