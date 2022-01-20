<?php

namespace App\Blog;


use Framework\Routes\Router;
use Framework\Views\Renderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class BlogModule
{
    /**
     * @var Renderer
     */
    private $renderer;
   public function __construct(Router $router){
       $this->renderer = new Renderer();

       $router->get('/blog', [$this, 'index'], 'blog.index');
       $router->get('/blog/{slug:[a-z0-9\-]+}', [$this, 'show'], 'blog.show');
   }

    /**
     * @param Request $request
     * @return string
     */
   public function index(Request $request): string
   {
       $this->renderer->addPath('blog',__DIR__."/views");
       return $this->renderer->render("@blog/index");
   }


   public function show(Request $request): string
   {
       return "<h1>Bienvenue sur l'article ".$request->getAttribute('slug').'</h1>';
   }
}