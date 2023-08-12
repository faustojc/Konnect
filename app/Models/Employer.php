<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Employer extends Model
{
    use HasFactory, HasApiTokens;

    public function abilities(): array
    {
        return [
            'post-job' => 'post jobs',
            'view-applicants' => 'view applicants',
            'manage-employed' => 'manage employed',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function employed(): HasMany
    {
        return $this->hasMany(Employed::class);
    }

    public function employments(): HasMany
    {
        return $this->hasMany(Employment::class);
    }

    public function references(): HasMany
    {
        return $this->hasMany(Reference::class);
    }

    public function followers(): HasMany
    {
        return $this->hasMany(Follower::class);
    }
}
