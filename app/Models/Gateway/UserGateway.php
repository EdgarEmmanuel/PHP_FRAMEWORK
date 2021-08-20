<?php

namespace App\Models\Gateway;

use App\Models\Interfaces\IUser;
use App\ThirdParty\Excel\ExcelGateway;

class UserGateway implements IUser {

    private $excelInterface;

    public function __construct(){
        $this->excelInterface = new ExcelGateway();
    }

    public function getOneUserByEmailAndPassword(string $userEmail, string $userPassword){
       $this->excelInterface->retrieveOneUser($userEmail , $userPassword);
    }

}