<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    const LINE_DELIMITER = "<br />";

    public static function create(Model $model, string $action)
    {
        if (!$model instanceof LoggableEntityInterface) {
            return null;
        }

        $original = $action === LoggableEntityInterface::CREATED ? [] : $model->getOriginal();

        $diff = collect($model->getAttributes())
            ->diffAssoc($original)
            ->mapWithKeys(
                function ($value, $key) {
                    switch (true) {
                        case is_array($value):
                            $value = '(array)';
                            break;
                        case is_object($value) and !method_exists($value, '__toString'):
                            $value = '(object ' . get_class($value) . ')';
                            break;
                        case !is_object($value) and settype($value, 'string') === false:
                            $value = '(unknown type)';
                            break;
                        default:
                            $value = (string) $value;
                            break;
                    }

                    return [$key => "$key: $value"];
                }
            )->implode(self::LINE_DELIMITER);

        $diff = "{$model->getEntityName()} $action" . self::LINE_DELIMITER . $diff;

        $logRecord = new self;
        $logRecord->entity_alias = get_class($model);
        $logRecord->entity_id = $model->getEntityID();
        $logRecord->action_alias = $action;
        $logRecord->diff_text = $diff;

        return $logRecord;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
