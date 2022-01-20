<?php
namespace Tests\Framework;


use Framework\Views\Renderer;
use PHPUnit\Framework\TestCase;

class RendererTest extends TestCase {
    /**
     * @var Renderer
     */
    private $renderer;

    public function setUp(): void
    {
        $this->renderer = new Renderer();
    }


    public function testTherenderingOfTheRightPath()
    {
        $this->renderer->addPath("blog", __DIR__."/views");
        $content = $this->renderer->render("@blog/demo");
        $this->assertEquals($content, 'Welcome People');
    }


}