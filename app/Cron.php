<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cron extends Model
{
    protected $guarded = array('id');



    public static function notification_service()
    {
        if (self::launch_notification_service()) {
            $start = microtime(true);
            Notification::campaigns_finish();
            $time = microtime(true) - $start;
            Cron::create(
                array(
                    'event' => self::event_service_notification(),
                    'time' => $time
                )
            );
        }
    }

    public static function launch_notification_service()
    {
        return self::whereEvent(self::event_service_notification())->where('created_at','>',Carbon::now()->subDay()->format('Y-m-d H:i:s'))->count() == 0 ? true : false;
    }


    public static function event_service_notification()
    {
        return "notification-service";
    }
}
