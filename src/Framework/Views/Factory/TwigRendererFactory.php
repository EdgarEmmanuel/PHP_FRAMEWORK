<?php
namespace Framework\Views\Factory;


use Framework\Views\Extension\RouterTwigExtension;
use Framework\Views\TwigRenderer;
use Psr\Container\ContainerInterface;

class TwigRendererFactory{

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container){
        $PATH = $container->get('views.path');
        $RouterTwigExtension = $container->get(RouterTwigExtension::class);

        $loader = new \Twig\Loader\FilesystemLoader($PATH);
        $twig = new \Twig\Environment($loader, []);
        $twig->addExtension($RouterTwigExtension);

        return new TwigRenderer($loader, $twig);
    }

}