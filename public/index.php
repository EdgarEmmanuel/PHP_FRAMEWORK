<?php

require dirname(__DIR__) . '/vendor/autoload.php';

//all modules
$modules = [
    \App\Blog\BlogModule::class
];

// database
$databaseConfig = dirname(__DIR__).'/app/Config/DBConfig.php';

// dependency injection container
$builder = new \DI\ContainerBuilder();
$builder->addDefinitions($databaseConfig);
$builder->addDefinitions(dirname(__DIR__).'/app/Config/Config.php');
$container = $builder->build();


$app = new \Framework\App($container,$modules);


// requests and responses
$REQUEST = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();
$RESPONSE = $app->run($REQUEST);
\Http\Response\send($RESPONSE);