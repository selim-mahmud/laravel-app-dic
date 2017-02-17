<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 8/02/2017
 * Time: 9:18 PM
 */

namespace App\Services;

use App\Contracts\ActivityLoggerContract;
use Spatie\Activitylog\Models\Activity;

class ActivityLoggerService implements ActivityLoggerContract
{
    /**
     * {@inheritdoc}
     */
    public function basicActivitySave(string $logName, string $description, array $property = []): Activity
    {
        return activity()
            ->useLog($logName)
            ->withProperties($property)
            ->log($description);
    }
}