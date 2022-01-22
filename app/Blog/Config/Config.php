<?php

use App\Blog\BlogModule;
use function DI\{Factory};
use App\Blog\Factory\BlogModuleFactory;

return [
    'blog.prefix' => '/blog',
    BlogModule::class => Factory(BlogModuleFactory::class),
];