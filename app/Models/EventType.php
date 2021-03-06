<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $fillable = ['title'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
