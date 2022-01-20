<?php
namespace Framework\Views;


interface IRenderer{
    public function addPath(string $namespace, string $value);
    public function render(string $view, array $parameters = []): string;
    public function addGlobal(string $key, $value): void;
}
