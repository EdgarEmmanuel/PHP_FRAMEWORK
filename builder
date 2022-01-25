#!/usr/bin/env php
<?php

/**
 *****************************************************
 * link for creating a command
 * https://symfony.com/doc/current/components/console.html
 *
 * https://symfony.com/doc/current/components/console.html
 *
 * https://symfony.com/doc/current/console
 * **************************************************
 */

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Framework\Commands\Commands;

$application = new Application();

$commands = Commands::getCommands();
foreach ($commands as $command){
    $application->add($command);
}


$application->run();