<?php

namespace Database\Seeders;

use App\Models\Fine;
use App\Models\Loan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $overdueLoans = Loan::where('status', 'overdue')->get();

        foreach ($overdueLoans as $loan) {
            Fine::create([
                'loan_id' => $loan->id,
                'amount' => rand(10, 100),
                'paid' => fake()->boolean(30),
            ]);
        }
    }
}
