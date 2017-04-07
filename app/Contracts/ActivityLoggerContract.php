<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 8/02/2017
 * Time: 9:06 PM
 */

namespace App\Contracts;

use Spatie\Activitylog\Models\Activity;

interface ActivityLoggerContract
{
    /**
     * logs user activity
     *
     * @param string $logName
     * @param string $description
     * @param array $property
     * @return ActivityLogger
     */
    public function basicActivitySave(string $logName, string $description, array $property): Activity;

    /**
     * logs user detail activity
     *
     * @param string $logName
     * @param $userModel
     * @param string $description
     * @param array $property
     * @return ActivityLogger|Activity
     */
    public function detailActivitySave(string $logName, $userModel, string $description, array $property): Activity;
}