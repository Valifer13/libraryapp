<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookReaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($x = 1; $x < User::count(); $x++) {
            BookReaction::factory()->recycle(Book::all())->create([
                'user_id' => $x,
            ]);
        }
    }
}
