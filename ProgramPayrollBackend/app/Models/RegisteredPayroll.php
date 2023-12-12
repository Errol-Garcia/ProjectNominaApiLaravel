<?php

namespace App\Models;

use App\Models\LogPayroll;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegisteredPayroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_date'
    ];
        
    public function logPayrolls() : HasMany{
        return $this->hasMany(LogPayroll::class);
    }
}