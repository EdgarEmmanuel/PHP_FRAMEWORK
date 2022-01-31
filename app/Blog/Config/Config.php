<?php

use App\Blog\BlogModule;
use function DI\{Factory};
use App\Blog\Factory\BlogModuleFactory;
use App\Blog\Interfaces\IPost;
use App\Blog\Models\Post;

return [
    'blog.prefix' => '/blog',
    BlogModule::class => Factory(BlogModuleFactory::class),
    IPost::class => function (\Psr\Container\ContainerInterface $container){
       $pdo = $container->get(\PDO::class);
       return new Post($pdo);
    }
];