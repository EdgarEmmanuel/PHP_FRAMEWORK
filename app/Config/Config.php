<?php

use App\Blog\BlogModule;
use Framework\Routes\Router;
use Framework\Views\Extension\RouterTwigExtension;
use Framework\Views\Factory\TwigRendererFactory;
use Framework\Views\IRenderer;
use function DI\{create};
use function DI\Factory;

return [
    'views.path' => function(){
        $FULL_PATH = dirname(__DIR__)."/src/Views";
        $dat = str_replace('public', '', $_SERVER['DOCUMENT_ROOT']);
        return $dat."src/Views";
    },
    'blog.prefix' => '/blog',
    BlogModule::class => Factory(\App\Blog\Factory\BlogModuleFactory::class),
    Router::class => create(),
    RouterTwigExtension::class => function (\Psr\Container\ContainerInterface $container){
      $router = $container->get(Router::class);
      return new RouterTwigExtension($router);
    },
    IRenderer::class => Factory(TwigRendererFactory::class)
];