<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'id'  => 1,
                'name' => 'laravel',
            ],
            [
                'id'  => 2,
                'name' => 'php',
            ],
            [
                'id'  => 3,
                'name' => 'VueJs',
            ],
            [
                'id'  => 4,
                'name' => 'my-first-blog',
            ],
            [
                'id'  => 5,
                'name' => 'Wordpress',
            ],
        ];

        Tag::insert($tags);
    }
}
