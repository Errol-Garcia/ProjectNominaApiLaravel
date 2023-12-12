<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Salary;
use App\Models\Department;
use App\Models\LogPayroll;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    
    public function logPayrolls() : HasMany{
        return $this->hasMany(LogPayroll::class);
    }

    public function salaries() : HasMany{
        return $this->HasMany(Salary::class);
    }


    public function department():BelongsTo{
        return $this->belongsTo(Department::class);
    }

    public function post():BelongsTo{
        return $this->belongsTo(Post::class);
    }
}