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

        Category::create(['name' => 'History', 'color' => 'bg-yellow-700']); // warna seperti perkamen tua
        Category::create(['name' => 'Religious', 'color' => 'bg-indigo-700']); // warna spiritual dan tenang
        Category::create(['name' => 'Adventure', 'color' => 'bg-orange-600']); // cerah dan penuh energi
        Category::create(['name' => 'Fantasy', 'color' => 'bg-purple-700']); // magis dan imajinatif
        Category::create(['name' => 'Self Improvement', 'color' => 'bg-teal-600']); // segar dan positif
        Category::create(['name' => 'Romance', 'color' => 'bg-rose-500']); // romantis dan hangat
        Category::create(['name' => 'Horror', 'color' => 'bg-gray-900']); // gelap dan misterius
        Category::create(['name' => 'Science', 'color' => 'bg-blue-600']); // rasional dan profesional
        Category::create(['name' => 'Biography', 'color' => 'bg-amber-600']); // hangat dan mendalam
        Category::create(['name' => 'Education', 'color' => 'bg-sky-500']); // cerah dan informatif
        Category::create(['name' => 'Health & Fitness', 'color' => 'bg-green-600']); // segar dan sehat
        Category::create(['name' => 'Business', 'color' => 'bg-gray-700']); // profesional dan serius

    }
}
