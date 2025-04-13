<?php

use App\Models\Loan;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    $now = Carbon::now();

    $affected = Loan::where('status', 'borrowed')
        ->whereNull('return_date')
        ->whereDate('due_date', '<', $now)
        ->update(['status' => 'overdue']);
    
    $this->info("Updated $affected loan(s) to overdue.");
})->daily();