<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $borrowDate = fake()->dateTimeBetween('-7 days', 'now');
        $dueDate = fake()->dateTimeBetween('now', '+7 days');
        $returnDate = fake()->optional()->dateTimeBetween('-7 days', '+7 days');

        if ($returnDate) {
            $status = 'returned';
        } else if (now()->greaterThan($dueDate)) {
            $status = 'overdue';
        } else {
            $status = 'borrowed';
        }

        return [
            'book_id' => Book::factory(),
            'user_id' => User::factory(),
            'admin_id' => Admin::factory(),
            'borrow_date' => $borrowDate,
            'due_date' => $dueDate,
            'return_date' => $returnDate,
            'status' => $status,
        ];
    }
}
