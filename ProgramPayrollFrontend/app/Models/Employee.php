<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'identification_card',
        'names',
        'last_names',
        'salary',
        'number_phone',
        'address',
        'email',
        'department_id',
        'post_id',
    ];
    
    public function log_payrolls() : HasMany{
        return $this->hasMany(Log_payroll::class);
    }

    public function salary() : HasOne{
        return $this->hasOne(Salary::class);
    }


    public function department():BelongsTo{
        return $this->belongsTo(Department::class);
    }

    public function post():BelongsTo{
        return $this->belongsTo(Post::class);
    }
}