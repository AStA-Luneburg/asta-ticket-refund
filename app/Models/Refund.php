<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    public static string $anonymized_name = 'Anonymisiert';
    public static string $anonymized_iban = 'DEXX XXXX XXXX XXXX XXXX XX';

    public function user()
    {
        return $this->belongsTo(User::class, 'matriculation_number', 'matriculation_number');
    }

    public function export()
    {
        return $this->belongsTo(Export::class, 'export_id', 'id');
    }

    public function isExported()
    {
        return $this->export !== null;
    }

    public function isAnonymized()
    {
        return $this->iban === Refund::$anonymized_iban;
    }

    public function anonymize()
    {
        return $this->update([
            'name' => Refund::$anonymized_name,
            'iban' => Refund::$anonymized_iban,
        ]);
    }

    protected $fillable = [
        'email',
        'name',
        'iban',
        'matriculation_number',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    public function getMetaNameAttribute()
    {
        return 'Rückerstattung von ' . $this->user->name;
    }
}
