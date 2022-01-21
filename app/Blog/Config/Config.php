<?php

use App\Blog\BlogModule;
use function DI\{create,get};

return [
 'blog.prefix' => '/blog',
    BlogModule::class => create(BlogModule::class)
        ->property('prefix', get('blog.prefix'))
];