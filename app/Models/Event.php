<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'project_id',
        'event_type_id',
        'date',
        'short_description',
        'description',
        'is_completed',
        'last_update_reason'
    ];

    protected $dates = [
        'deleted_at',
        'date'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function event_type()
    {
        return $this->belongsTo(EventType::class);
    }
}
