<?php
namespace App\Blog\Interfaces;


interface IPost
{
    public function getOnePost(int $id);
    public function getAllPosts();
}
