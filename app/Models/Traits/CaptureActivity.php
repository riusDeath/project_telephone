<?php

namespace App\Models\Traits;

use App\Models\Log;

trait CaptureActivity 
{
    protected static function bootCapturesActivity()
    {
        foreach (static::getModelEvents() as $event) {
            static::$event(function($model) use ($event){
                $model->captureActivity($event);
            });
        }
    }

    protected static function getModelEvents()
    {
    	if (isset(static::$capturedEvents)) {
    		return static::$capturedEvents;
    	} 
    	
    	return ['created', 'updated', 'deleted'];
    }

    public function getActivityName($model, $action)
    {
        $name = strtolower(class_basename($model));

        return "{$action}_{$name}";
    }

    protected static function mapArrtibutes()
    {
        return [
            'activityUserId' => 'user_id',
            'activityTargetId' => 'id',
            'activityTargetType' => static::class,
        ];
    }

    public function captureActivity($event)
    {
        $attributes = fetch_static_attributes(static::class, static::mapArrtibutes());
        list($userId, $targetId, $targetType) = $attributes;
        Log::create([
            'user_id' => $this->$userId,
            'targetable_id' => $this->targetId,
            'targetable_type' => $targetType,
            'action' => $this->getActivityName($this, $event),
        ]);
    }
}
