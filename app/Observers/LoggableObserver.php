<?php

namespace App\Observers;

use App\Models\ActionLog;
use App\Models\LoggableEntityInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LoggableObserver
{
    public function created(Model $model)
    {
        $this->process($model, LoggableEntityInterface::CREATED);
    }

    public function updated(Model $model)
    {
        $this->process($model, LoggableEntityInterface::UPDATED);
    }

    public function deleted(Model $model)
    {
        $this->process($model, LoggableEntityInterface::DELETED);
    }

    private function process(Model $model, string $action)
    {
        if (!Auth::check()) {
            return;
        }

        $logRecord = ActionLog::create($model, $action);
        if (!$logRecord) {
            return;
        }

        Auth::user()->actions()->save($logRecord);
    }
}
