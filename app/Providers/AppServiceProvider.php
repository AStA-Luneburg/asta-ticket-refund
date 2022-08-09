<?php

namespace App\Providers;

use App\Models\Refund;
use App\Policies\RefundPolicy;
use App\Services\RefundService;
use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        RefundService::class => RefundService::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            // Using Laravel Mix
            Filament::registerTheme(
                mix('css/filament.css'),
            );
        });
    }
}
