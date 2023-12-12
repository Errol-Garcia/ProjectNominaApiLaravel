<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class registered_payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_date'
    ];
        
    public function log_payrolls() : HasMany{
        return $this->hasMany(Log_payroll::class);
    }
}