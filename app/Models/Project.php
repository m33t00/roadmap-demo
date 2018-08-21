<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = [
        'title', 'description'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function usersAccess(): BelongsToMany
    {
        return $this
            ->belongsToMany(User::class, UserAccess::TABLE)
            ->withPivot(UserAccess::CAN_READ, UserAccess::CAN_UPDATE);
    }

    public function usersCanRead(): BelongsToMany
    {
        return $this
            ->usersAccess()
            ->wherePivot(UserAccess::CAN_READ, true);
    }

    public function usersCanUpdate(): BelongsToMany
    {
        return $this
            ->usersAccess()
            ->wherePivot(UserAccess::CAN_UPDATE, true);
    }

    public function isUserCanRead(User $user): bool
    {
        return $this->usersCanRead->contains($user);
    }

    public function isUserCanUpdate(User $user): bool
    {
        return $this->usersCanUpdate->contains($user);
    }
}
