<?php

namespace App\Models\Gateway;

use App\Models\Interfaces\IUser;

class UserGateway implements IUser {

    public function getOneUserByEmailAndPassword(string $email, string $password){
        var_dump($password);
    }

}