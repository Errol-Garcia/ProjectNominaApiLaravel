<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Log_payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'worked_days',
        'extra_hours',
        'hour_value',
        'bono',
        'accrued_value',
        'discount_value',
        'net_income',
        'registration_date',
        'employee_id',
        'registered_payroll_id'
    ];

    public function Employee() : BelongsTo{
        return $this->belongsTo(Employee::class);
    }
    public function registered_payroll() : BelongsTo{
        return $this->belongsTo(registered_payroll::class);
    }
}