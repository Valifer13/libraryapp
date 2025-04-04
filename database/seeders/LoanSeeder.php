<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Loan::factory(100)->recycle([
            Book::all(),
            User::all(),
            Admin::all(),
        ])->create();
    }
}
