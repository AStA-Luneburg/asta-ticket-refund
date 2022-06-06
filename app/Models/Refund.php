<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function export()
    {
        return $this->belongsTo(Export::class, 'export_id', 'id');
    }

    protected $fillable = [
        'email',
        'name',
        'iban'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];
}
