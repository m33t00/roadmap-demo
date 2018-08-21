<?php

namespace App;

use App\Models\ActionLog;
use App\Models\Project;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function setAttribute($key, $value)
    {
        if ($key !== 'remember_token') {
            parent::setAttribute($key, $value);
        }
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function actions()
    {
        return $this->hasMany(ActionLog::class);
    }
}
