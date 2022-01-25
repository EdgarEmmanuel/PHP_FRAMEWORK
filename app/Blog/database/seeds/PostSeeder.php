<?php


use Phinx\Seed\AbstractSeed;

class PostSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'name'    => 'match between gabon and burkina faso',
                'slug'    => 'gabon-burkina-faso-can',
                'content'    => 'the players of the burkina faso will go to the quarter final by 
                winning against the gabon players ',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name'    => 'match between nigeria and tunisia',
                'slug'    => 'nigeria-tunisia',
                'content'    => "the players of nigeria will go home after loosing against the tunisia\'s players ",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $posts = $this->table('posts');
        $posts->insert($data)
            ->saveData();
    }
}
