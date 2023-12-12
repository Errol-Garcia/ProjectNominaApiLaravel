<?php

namespace App\Models;

use App\Models\Accrued;
use App\Models\Discount;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salary extends Model
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
        'employee_id',
        'discount_id',
        'accrued_id',
    ];
    public function employee():BelongsTo{
        return $this->belongsTo(Employee::class);
    }
    public function discount():BelongsTo{
        return $this->belongsTo(Discount::class);
    }
    public function accrued():BelongsTo{
        return $this->belongsTo(Accrued::class);
    }
}