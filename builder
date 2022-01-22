#!/usr/bin/env php
<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Framework\Commands\Commands;

$application = new Application();

$commands = Commands::getCommands();
foreach ($commands as $command){
    $application->add($command);
}


$application->run();