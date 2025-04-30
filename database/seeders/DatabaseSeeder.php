<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     UserSeeder::class,
        //     AdminSeeder::class,
        //     CategorySeeder::class,
        //     BookSeeder::class,
        //     WishlistSeeder::class,
        //     LoanSeeder::class,
        //     FineSeeder::class,
        //     BookReactionSeeder::class,
        // ]);

        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
