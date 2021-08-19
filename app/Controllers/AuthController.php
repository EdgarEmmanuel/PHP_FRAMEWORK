<?php

namespace App\Controllers;


class AuthController extends BaseController {

    public function home(){
        echo $this->templates->render("auth/home");
    }


    public function login(){
        $body = $this->request->getParsedBody();
        $username = $body["username"];
        $password = $body["password"];
        var_dump(" email : ".$username);
        var_dump("password : {$password}");
        //var_dump($body);
        die;
    }

}