<?php
namespace App\Blog\Models;


use App\Blog\Interfaces\IPost;
use PDO;

class Post implements IPost
{

    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * return paginated data
     *
     * @return void
     */
    public function findPaginated()
    {

    }

    /**
     * return one post by id
     *
     * @param  int $id
     * @return \stdClass
     */
    public function getOnePost(int $id): \stdClass
    {
        $query = $this->pdo
            ->prepare("SELECT * FROM posts where id = ?");
        $query->execute([$id]);
        $post = $query->fetch();

        return $post;
    }

    /**
     * return  an array of posts
     *
     * @return array
     */
    public function getAllPosts(): array
    {
        return $this->pdo
            ->query("SELECT * FROM posts order by created_at DESC LIMIT 10")
            ->fetchAll();
    }
}