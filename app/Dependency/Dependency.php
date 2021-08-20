<?php

namespace App\Dependency;

use function DI\create;
use App\Models\Interfaces\IUser;
use App\Models\Gateway\UserGateway;

class Dependency {


    public static function getDependencies(){
        return [
            // Bind an interface to an implementation
            //ArticleRepository::class => create(InMemoryArticleRepository::class),
            IUser::class =>  create(UserGateway::class),
        
        ];
    }
}