<?php

namespace App\ThirdParty\Excel;


interface IExcel {
    public function retrieveOneUser($email , $password);
}