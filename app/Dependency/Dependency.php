<?php

namespace App\Dependency;

use function DI\create;
use App\Models\Interfaces\IUser;
use App\Models\Gateway\UserGateway;
use function DI\autowire;


class Dependency {


    public static function getDependencies(){
        return [
            IUser::class =>  create(UserGateway::class),
            
        
        ];
    }
}