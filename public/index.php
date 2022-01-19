<?php

require '../vendor/autoload.php';

$app = new \Framework\App();

$REQUEST = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();


$RESPONSE = $app->run($REQUEST);

\Http\Response\send($RESPONSE);