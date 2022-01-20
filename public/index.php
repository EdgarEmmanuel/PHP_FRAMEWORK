<?php

require '../vendor/autoload.php';

$FULL_PATH = dirname(__DIR__)."/src/Views";
$PHPRenderer = new \Framework\Views\Renderer();
$TwigRenderer = new \Framework\Views\TwigRenderer($FULL_PATH);

$app = new \Framework\App([
    \App\Blog\BlogModule::class
],[
    'renderer' => $TwigRenderer
]);

$REQUEST = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();

$RESPONSE = $app->run($REQUEST);

\Http\Response\send($RESPONSE);