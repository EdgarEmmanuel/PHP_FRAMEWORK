<?php
namespace Tests\Framework;


use Framework\Routes\Router;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\ServerRequest;

class RouterTest extends \PHPUnit\Framework\TestCase
{
    public function setUp(): void
    {
        $this->router = new Router();
    }

    public function testTheBasicRouting()
    {
        $TEXT = 'hello this is the route';
        $request = new ServerRequest('GET','/blog');
        $this->router->get("/blog", function(){ return 'hello this is the route'; }, '/blog');
        $routeObject = $this->router->match($request);
        $this->assertEquals('/blog', $routeObject->getName());
        $this->assertEquals($TEXT, call_user_func_array($routeObject->getCallBack(),[$request]));
    }

    public function testTheBasicRoutingWhenUrlDoesNotExist()
    {
        $request = new ServerRequest('GET','/blogaze');
        $this->router->get("/blog", function(){ return 'hello this is the route'; }, 'blog');
        $routeObject = $this->router->match($request);
        $this->assertEquals(null, $routeObject);
    }


    public function testTheBasicRoutingWhenComplexUrlDoesNotExist()
    {
        $TEXT = 'hello this is the route with complex URL';
        $request = new ServerRequest('GET','/blog/mon-slug-8');
        $this->router->get("/blog", function(){ return 'hello this is the route'; }, 'blog');
        $this->router->get("/blog/{slug:[a-z0-9\-]+}-{id:\d+}",
            function(){ return 'hello this is the route with complex URL'; }, 'blog.show');
        $routeObject = $this->router->match($request);
        $this->assertEquals('/blog/{slug:[a-z0-9\-]+}-{id:\d+}', $routeObject->getName());
        $this->assertEquals([
            'slug' => 'mon-slug',
            'id' => '8'
        ], $routeObject->getParameters());
    }

    public function testTheBasicRoutingGenerateURI()
    {
        $this->router->get("/blog", function(){ return 'hello this is the route'; }, 'blog');
        $this->router->get("/blog/{slug:[a-z0-9\-]+}-{id:\d+}",
            function(){ return 'hello this is the route with complex URL'; }, 'blog.show');

        $uri = $this->router->generateURI('blog.show',[
            "slug" => "mon-article",
            "id" => 18
        ]);

        $this->assertEquals('/blog/mon-article-18', $uri);
    }
}
