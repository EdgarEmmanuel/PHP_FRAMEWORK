<?php
namespace App\Default;


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

class DefaultModule extends Module
{

    use TraitRouteHelper;

    /**
     * @var array
     */
    const DEFINITIONS = __DIR__. '/Config/Config.php';

    /**
     * @var string
     */
    const MIGRATIONS = [];

    /**
     * @var string
     */
    const SEEDS = [];

    /**
     * @var array
     */
    const DB_CONFIG = [];

    /**
     * @var Renderer
     */
    private $renderer;

    /**
     * @var Router
     */
    private $router;

    public function __construct(string $prefix, Router $router, IRenderer $renderer)
    {

        // for the views
        $this->renderer = $renderer;
        $this->renderer->addPath('default', __DIR__."/views/twig");
        $this->renderer->setLoaderPath(__DIR__."/views/twig");


        // for the routes
        $this->router = $router;
        $this->router->get($prefix, [$this, 'index'], 'default.index');
    }


    /**
     * @param  Request $request
     * @return string
     */
    public function index(Request $request): string
    {

        return $this->renderer->render("@default/index");
    }

}