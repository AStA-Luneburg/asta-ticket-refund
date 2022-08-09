<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\RefundManagerService;

class RefundManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RefundManagerService::class;
    }
}
