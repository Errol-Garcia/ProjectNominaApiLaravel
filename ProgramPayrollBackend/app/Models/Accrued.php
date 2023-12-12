<?php

namespace App\Models;

use App\Models\Salary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function salaries() : HasMany{
        return $this->hasMany(Salary::class);
    }
}