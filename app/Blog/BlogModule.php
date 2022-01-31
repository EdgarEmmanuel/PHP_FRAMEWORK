<?php

namespace App\Blog;


use App\Blog\Interfaces\IPost;
use Framework\Module\Module;
use Framework\Routes\Router;
use Framework\Routes\TraitRouteHelper;
use Framework\Views\IRenderer;
use Framework\Views\Renderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use PDO;
use GuzzleHttp\Psr7\Response as ResponseGuzzle;

class BlogModule extends Module
{

    use TraitRouteHelper;

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

    /**
     * @var IPost
     */
    private $IPost;

    /**
     * @var Router
     */
    private $router;

   public function __construct(string $prefix, Router $router, IRenderer $renderer, IPost $IPost){

       // for the database pdo
       $this->IPost = $IPost;

       // for the views
       $this->renderer = $renderer;
       $this->renderer->addPath('blog',__DIR__."/views/twig");

       // for the routes
       $this->router = $router;
       $this->router->get($prefix, [$this, 'index'], 'blog.index');
       $this->router->get($prefix.'/{slug:[a-z0-9\-]+}-{id:[0-9]+}', [$this, 'show'], 'blog.show');
   }

    /**
     * @param Request $request
     * @return string
     */
   public function index(Request $request): string
   {
       $posts = $this->IPost->getAllPosts();

       return $this->renderer->render("@blog/index", compact("posts",$posts));
   }


   public function show(Request $request)
   {
       $slug = $request->getAttribute('slug') ? $request->getAttribute('slug') : '';
       $id = $request->getAttribute('id') ? $request->getAttribute('id') : 0;


       $post = $this->IPost->getOnePost($id);

       if($post->slug !== $slug){
           return $this->redirect("blog.show",[
               "slug" => $post->slug, "id" => $post->id
           ]);
       }

       return $this->renderer->render("@blog/show", compact("post",$post));
   }
}