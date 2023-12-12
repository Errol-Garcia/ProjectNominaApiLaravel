<?php

namespace App\Models;

use App\Models\Salary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function salaries() : HasMany{
        return $this->hasMany(Salary::class);
    }

}