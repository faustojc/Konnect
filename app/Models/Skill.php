<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Skill extends Model
{
    use HasFactory;

    public function employeeSkill(): HasOne
    {
        return $this->hasOne(EmployeeSkill::class);
    }
}
