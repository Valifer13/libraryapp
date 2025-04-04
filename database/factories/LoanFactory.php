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
        $borrowDate = \Carbon\Carbon::parse(fake()->dateTimeBetween('-30 days', 'now'));
        $dueDate = $borrowDate->copy()->addDays(7);
        $returnDate = fake()->optional()->dateTimeBetween($borrowDate, $borrowDate->copy()->addDays(3));

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
