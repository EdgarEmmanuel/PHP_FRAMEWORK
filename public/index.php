<?php

require '../vendor/autoload.php';

$app = new \Framework\App([
    \App\Blog\BlogModule::class
],[
    'renderer' => new \Framework\Views\Renderer()
]);

$REQUEST = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();

$RESPONSE = $app->run($REQUEST);

\Http\Response\send($RESPONSE);