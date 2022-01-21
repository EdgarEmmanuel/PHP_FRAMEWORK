<?php

namespace Framework\Views;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigRenderer implements IRenderer{

    private $twig;
    private $loader;


    private $extension;

    public function __construct(FilesystemLoader $loader, Environment $twig, ?string $withExtension = '.twig'){
        $this->loader = $loader;
        $this->extension = $withExtension;
        $this->twig = $twig;
    }

    public function addPath(string $namespace, string $value)
    {
        $this->loader->addPath($value, $namespace);
    }

    public function render(string $view, array $parameters = []): string
    {
        return $this->twig->render($view. $this->extension, $parameters);
    }

    public function addGlobal(string $key, $value): void
    {
        $this->twig->addGlobal($key, $value);
    }
}

