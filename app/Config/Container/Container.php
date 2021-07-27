<?php

namespace App\Config\Container;

use function DI\create;
use SuperBlog\Model\ArticleRepository;
use SuperBlog\Persistence\InMemoryArticleRepository;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use DI\ContainerBuilder;
use League\Plates\Engine;

class Container {
    /**
     * PHP/DI
     * https://php-di.org/doc/container.html
     */

    private $containerBuilder;

    public function __construct(){
        $this->containerBuilder = new ContainerBuilder;
    }


    /**
     * responsible to instantiate the container for all the dependency
     */
    public function boot(){

        $dependencies = $this->load();
        $this->containerBuilder->addDefinitions($dependencies);

        return $this->containerBuilder->build();

    }


    public function load(){
        return [
            // Bind an interface to an implementation
            //ArticleRepository::class => create(InMemoryArticleRepository::class),
        
            // Configure Twig
            // Engine::class => function () {
            //     $templates = new Engine('../../../app/Views/templates/');
            //     return $templates;
            // },
        ];
    }

}

