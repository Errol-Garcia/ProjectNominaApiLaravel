<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Accrued extends Model
{
    use HasFactory;
    protected $fillable = [
        'feeding',
        'living_place',
        'transport',
        'extra',
        'registration_date',
    ];
    public function accrued() : HasMany{
        return $this->hasMany(Salary::class);
    }
}