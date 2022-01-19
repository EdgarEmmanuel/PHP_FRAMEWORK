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

use GuzzleHttp\Psr7\Response;
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

            if ($uri == "/blog") {
                $response = new Response(200, [], '<h1>Blog<h1>');
                return $response;
            }

            $response = new Response(404, [], '<h1>Not Found<h1>');
            return $response;
        }

        $response = new Response(404, [], '<h1>Not Found<h1>');
        return $response;
    }
}
