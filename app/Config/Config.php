<?php

use Framework\Routes\Router;
use Framework\Views\Extension\RouterTwigExtension;
use Framework\Views\Factory\TwigRendererFactory;
use Framework\Views\IRenderer;
use function DI\{create};
use function DI\Factory;

return [
    'views.path' => function () {
        $PATH = str_replace('public', '', $_SERVER['DOCUMENT_ROOT']);
        return $PATH."src/Views";
    },

    Router::class => create(),

    RouterTwigExtension::class => function (\Psr\Container\ContainerInterface $container) {
        $router = $container->get(Router::class);
        return new RouterTwigExtension($router);
    },

    IRenderer::class => Factory(TwigRendererFactory::class),

    \PDO::class => function (\Psr\Container\ContainerInterface $container) {
        $host = $container->get('database.host');
        $database = $container->get('database.name');
        $user = $container->get('database.user');
        $password = $container->get('database.password');
        $pdo = new \PDO(
            'mysql:host=' . $host . ';dbname=' . $database,
            $user,
            $password,
            [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]
        );
        return $pdo;
    }
];