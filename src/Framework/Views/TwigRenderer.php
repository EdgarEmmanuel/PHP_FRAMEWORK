<?php

namespace Framework\Views;


class TwigRenderer implements IRenderer{

    private $twig;
    private $loader;


    private $extension;

    public function __construct(string $fullPath, ?string $withExtension = '.twig'){
        $this->loader =new \Twig\Loader\FilesystemLoader($fullPath);
        $this->extension = $withExtension;
        $this->twig = new \Twig\Environment($this->loader, []);
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

