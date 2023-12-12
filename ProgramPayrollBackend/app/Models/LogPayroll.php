<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\RegisteredPayroll;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogPayroll extends Model
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

    public function employee() : BelongsTo{
        return $this->belongsTo(Employee::class);
    }
    public function registeredPayroll() : BelongsTo{
        return $this->belongsTo(RegisteredPayroll::class);
    }
}