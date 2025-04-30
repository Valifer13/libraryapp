<?php

use App\Models\Fine;
use App\Models\Loan;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::job(function () {
    $now = Carbon::now();

    $affected = Loan::where('status', 'borrowed')
        ->whereNull('return_date')
        ->whereDate('due_date', '<', $now)
        ->update(['status' => 'overdue']);

    $this->info("Updated $affected loan(s) to overdue.");
})->daily();

Schedule::job(function () {
    $overdueLoans = Loan::where('status', 'overdue')->get();

    foreach ($overdueLoans as $overdueLoan) {
        if (!isset($overdueLoan->fine)) {
            Fine::query()->create([
                'loan_id' => $overdueLoan->id,
                'amount' => $overdueLoan->amount + 2.00,
            ]);
        } else {
            $overdueLoan->fine->increment('amount', 2.00);
        }
    }
})->daily();