<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model
{
    const TABLE = 'user_access';

    const CAN_READ = 'can_read';
    const CAN_UPDATE = 'can_update';


    protected $fillable = [
        'can_read',
        'can_update'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
