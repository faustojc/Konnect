<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{
    use HasFactory, HasApiTokens;

    public function abilities(): array
    {
        return [
            'apply-job' => 'apply jobs',
            'view-applications' => 'view applications',
            'edit-applications' => 'edit applications',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function applicant(): HasMany
    {
        return $this->hasMany(Applicant::class);
    }

    public function education(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    public function employed(): HasMany
    {
        return $this->hasMany(Employed::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(EmployeeDocument::class);
    }

    public function skills(): HasMany
    {
        return $this->hasMany(EmployeeSkill::class);
    }

    public function references(): HasMany
    {
        return $this->hasMany(Reference::class);
    }

    public function followings(): HasMany
    {
        return $this->hasMany(Following::class);
    }
}
