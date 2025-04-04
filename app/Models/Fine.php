<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Fine extends Model
{
    /** @use HasFactory<\Database\Factories\FineFactory> */
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'amount',
        'paid',
    ];

    public function loan(): HasOne
    {
        return $this->hasOne(Loan::class);
    }
}
