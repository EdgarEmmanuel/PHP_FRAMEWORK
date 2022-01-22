<?php

namespace App\Blog;


use Framework\Module\Module;
use Framework\Routes\Router;
use Framework\Views\IRenderer;
use Framework\Views\Renderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class BlogModule extends Module
{

    /**
     * @var array
     */
    const DEFINITIONS = __DIR__. '/Config/Config.php';

    /**
     * @var string
     */
    const MIGRATIONS = __DIR__ . '/database/migrations';

    /**
     * @var string
     */
    const SEEDS = __DIR__ . '/database/seeds';

    /**
     * @var array
     */
    const DB_CONFIG = __DIR__. '/Config/DBConfig.php';

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