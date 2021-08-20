<?php

namespace App\Controllers;
use App\Models\Interfaces\IUser;

class AuthController extends BaseController {

    private $userInterface ;

    public function __construct(IUser $userInterface){
        parent::__construct();
        $this->userInterface = $userInterface;
    }

    public function home(){
        echo $this->templates->render("auth/home");
    }


    public function login(){
        $body = $this->request->getParsedBody();
        $email = $body["email"];
        $password = $body["password"];
        // var_dump(" email : ".$username);
        // var_dump("password : {$password}");
        //var_dump($body);
        $this->userInterface->getOneUserByEmailAndPassword($email,$password);
        die;
    }

}