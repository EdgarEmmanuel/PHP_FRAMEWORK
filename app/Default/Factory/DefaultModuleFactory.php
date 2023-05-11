<?php

namespace App\Default\Factory;


use App\Default\DefaultModule;

use App\Blog\Interfaces\IPost;
use Framework\Routes\Router;
use Framework\Views\IRenderer;
use Psr\Container\ContainerInterface;

class DefaultModuleFactory
{
    /**
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(Router::class);
        $renderer = $container->get(IRenderer::class);
        $prefix = $container->get('module.prefix.default');
        return new DefaultModule($prefix, $router, $renderer);
    }
}