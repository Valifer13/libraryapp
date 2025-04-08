<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(10)->create();

        Category::create([ 'name' => 'History' ]);
        Category::create([ 'name' => 'Religious' ]);
        Category::create([ 'name' => 'Adventure' ]);
        Category::create([ 'name' => 'Fantasy' ]);
        Category::create([ 'name' => 'Self Improvement' ]);
        Category::create([ 'name' => 'Romance' ]);
        Category::create([ 'name' => 'Horror' ]);
        Category::create([ 'name' => 'Science' ]);
        Category::create([ 'name' => 'Biography' ]);
        Category::create([ 'name' => 'Education' ]);
        Category::create([ 'name' => 'Health & Fitness' ]);
        Category::create([ 'name' => 'Business' ]);
    }
}
