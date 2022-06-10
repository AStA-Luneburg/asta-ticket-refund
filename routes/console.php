<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('prepare', function () {
    $this->info('Clearing caches...');
    $this->call('cache:clear', [], );
    $this->call('view:clear');
    $this->call('route:clear');
    $this->call('config:clear');
    $this->newLine();

    $this->info('Running migrate...');
    $this->call('migrate');
    $this->newLine();

    $this->info('Caching...');
    $this->call('view:cache');
    $this->call('route:cache');
    $this->call('config:cache');
    $this->newLine();

    $this->info('AStA-Ticket-Refund is ready to be used!');
})->purpose('Prepare the software for usage');
