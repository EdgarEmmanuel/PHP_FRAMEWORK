<?php
namespace Framework\Views\Extension;


use Framework\Routes\Router;
use Twig\Extension\AbstractExtension;

class RouterTwigExtension extends AbstractExtension {

    private $router;

    public function __construct(Router $router){
        $this->router = $router;
    }

    public function getFunctions()
    {
        return [
            new \Twig\TwigFunction('path', [$this,'pathFor']),
        ];
    }


    public function pathFor(string $path, array $params = []): string{
        return $this->router->generateURI($path, $params);
    }

}
