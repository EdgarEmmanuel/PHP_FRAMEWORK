<?php

use App\Default\DefaultModule;
use App\Default\Factory\DefaultModuleFactory;

use function DI\{Factory};

return [
    'module.prefix.default' => '/',
    DefaultModule::class => Factory(DefaultModuleFactory::class),
];