<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Event extends Model implements LoggableEntityInterface
{
    use SoftDeletes, Notifiable;

    const ENTITY_NAME = 'Event';

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

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function getEntityID(): int
    {
        return $this->id;
    }

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
}
