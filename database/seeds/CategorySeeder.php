<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id'  => 1,
                'name' => 'Framework',
            ],
            [
                'id'  => 2,
                'name' => 'Language',
            ],
            [
                'id'  => 3,
                'name' => 'Library',
            ],
            [
                'id'  => 4,
                'name' => 'Blog',
            ],
            [
                'id'  => 5,
                'name' => 'CMS',
            ],
        ];

        Category::insert($categories);
    }
}
