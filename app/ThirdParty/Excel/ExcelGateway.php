<?php

namespace App\ThirdParty\Excel;


class ExcelGateway implements IExcel {
    public function retrieveOneUser($email , $password){
        var_dump($password);
        var_dump($email);
    }
}