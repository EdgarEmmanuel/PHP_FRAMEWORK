<?php

namespace App\Blog\Factory;


use App\Blog\BlogModule;
use Framework\Routes\Router;
use Framework\Views\IRenderer;
use Psr\Container\ContainerInterface;

class BlogModuleFactory{
    public function __invoke(ContainerInterface $container){
        $router = $container->get(Router::class);
        $renderer = $container->get(IRenderer::class);
        $prefix = $container->get('blog.prefix');
        return new BlogModule($prefix,$router,$renderer);
    }
}