<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'primary',
    ];

    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function phoneable(): BelongsTo
    {
        return $this->morphTo();
    }


    /**
     * STATIC FUNCTIONS
     */
}
