<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User;
use Illuminate\Validation\ValidationException;


class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
