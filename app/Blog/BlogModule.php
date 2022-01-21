<?php

namespace App\Blog;


use Framework\Config\Config;
use Framework\Routes\Router;
use Framework\Views\IRenderer;
use Framework\Views\Renderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class BlogModule
{

    /**
     * @var Renderer
     */
    private $renderer;

   public function __construct(string $prefix, Router $router, IRenderer $renderer){
       $this->renderer = $renderer;
       $this->renderer->addPath('blog',__DIR__."/views/twig");

       $router->get($prefix, [$this, 'index'], 'blog.index');
       $router->get($prefix.'/{slug:[a-z0-9\-]+}', [$this, 'show'], 'blog.show');
   }

    /**
     * @param Request $request
     * @return string
     */
   public function index(Request $request): string
   {
       return $this->renderer->render("@blog/index");
   }


   public function show(Request $request): string
   {
       return $this->renderer->render("@blog/show", [
           'slug' => $request->getAttribute('slug')
       ]);
   }
}