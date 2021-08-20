<?php

namespace App\Config\Container;

use function DI\create;
use DI\ContainerBuilder;
use App\Dependency\Dependency;

class Container {
    /**
     * PHP/DI
     * https://php-di.org/doc/container.html
     * https://github.com/PHP-DI/demo
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
       return  Dependency::getDependencies();
    }

}

