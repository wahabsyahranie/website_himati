<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Schedule::command('app:kurangi-stoks')->dailyAt('00:01');
// Schedule::command('app:kembalikan-stoks')->dailyAt('00:01');
Schedule::command('queue:work --stop-when-empty')->everyMinute();
// Schedule::command('app:kembalikan-stoks')->everyMinute();

////TO RUN SCHEDULER YOU NEED IMPLEMENT CRON ON CPANEL IF USING SHAREDHOSTING