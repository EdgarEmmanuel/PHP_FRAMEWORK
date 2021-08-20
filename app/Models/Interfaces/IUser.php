<?php

namespace App\Models\Interfaces;


interface IUser {
    public function getOneUserByEmailAndPassword(string $email, string $password);
}