<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discount extends Model
{
    protected $fillable = [
        'arl',
        'health',
        'pension',
        'parafiscal',
        'registration_date'
    ];
    use HasFactory;
    public function salarys() : HasMany{
        return $this->hasMany(Salary::class);
    }

}