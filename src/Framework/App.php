<?php
/**
 * MyClass File Doc Comment
 * php version 8.0.0
 *
 * @category App
 * @package  Framework
 * @author   Emmanuel Edgar <devbyjesus@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @version  GIT:1.0.0
 * @link     http://www.hashbangcode.com/
 */
namespace Framework;

use Framework\Routes\Router;
use GuzzleHttp\Psr7\Response;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
/**
 * MyClass App Doc Comment
 *
 * @category App
 * @package  Framework
 * @author   Emmanuel EDgar <devbyjesus@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
class App
{
    private $modules = [];

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param array $modules
     */
    public function __construct(ContainerInterface $container, array $modules = [])
    {
        $this->container = $container;
        foreach($modules as $module){
            $this->modules[] = $container->get($module);
        }
    }
    /**
     * The main Function that handles the Request and The Response
     *
     * @param ServerRequestInterface $request a thing
     *
     * @return ResponseInterface
     **/
    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();

        if (!empty($uri)) {
            if ($uri[-1] == "/") {
                $response = (new Response())
                    ->withStatus(301);
                return $response;
            }

            $route = $this->container->get(Router::class)->match($request);

            if(is_null($route)) {
                $response = new Response(404, [], '<h1>Not Found<h1>');
                return $response;
            }

            $params = $route->getParameters();

            $request = array_reduce(
                array_keys($params), function ($request, $key) use ($params) {
                    return $request->withAttribute($key, $params[$key]);
                }, $request
            );


            $response = call_user_func_array($route->getCallback(), [$request]);

            if(is_string($response)) {
                return new Response(200, [], $response);
            }

            if($response instanceof ResponseInterface) {
                return $response;
            }

            throw new \Exception(["Impossible de traiter cela"]);
        }

        $response = new Response(404, [], '<h1>Not Found<h1>');
        return $response;
    }

    public function getContainer(): ContainerInterface{
        return $this->container;
    }
}
