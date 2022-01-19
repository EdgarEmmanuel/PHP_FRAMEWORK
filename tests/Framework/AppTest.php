<?php
namespace Tests\Framework;


use Framework\App;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase {

    public function testAssertTrailingTest(){
        $app = new App();
        $request = new ServerRequest("GET","/demoslash/");
        $response = $app->run($request);
        $this->assertEquals(301, $response->getStatusCode());
    }


    public function testBlogPageContent(){
        $app = new App();
        $request = new ServerRequest("GET","/blog");
        $response = $app->run($request);
        $this->assertStringContainsString('<h1>Blog<h1>',(string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testPageNotFound(){
        $app = new App();
        $request = new ServerRequest("GET","/notfou65855858");
        $response = $app->run($request);
        $this->assertStringContainsString('<h1>Not Found<h1>',(string)$response->getBody());
        $this->assertEquals(404, $response->getStatusCode());
    }

}