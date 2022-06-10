<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EligibleStudent extends Model
{
    use HasFactory;

    public function refund() {
        return $this->hasOne(Refund::class, 'matriculation_number', 'matriculation_number');
    }
}
