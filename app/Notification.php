<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Notification extends Model
{

    protected $guarded = array('id');

    public function getSinceAttribute()
    {
        Carbon::setLocale('fr');
        return str_replace('après','',Carbon::now()->diffForHumans($this->created_at));
    }

    public static function campaigns_finish()
    {
        $campaigns = Campaign::whereCmm(1)
            ->where('end','<',Carbon::now()->subDays(7)->format('Y-m-d'))
            ->whereIn('results_state',array('aucuns','partiels',''))
            ->whereNotIn('id',self::campaigns_service_notified())
            ->get();

        if ($campaigns) {
            foreach ($campaigns as $campaign) {
                $services = self::result_notify($campaign);
            }
        }

        if (isset($services)) {
            $services = array_unique($services);
            self::send_service_notification($services);
        }

    }

    public static function campaigns_service_notified()
    {
        return self::distinct('campaign_id')->pluck('campaign_id')->toArray();
    }

    public static function result_notify($campaign)
    {
        $services = array();
        $campaign->load('Channels');
        foreach ($campaign->Channels as $channel) {
            $channel->load('Indicators');
            if ($channel->Indicators) {
                array_push($services,$channel->class_name);
            }
        }
        $services = array_unique($services);
        $services_id = array();

        foreach ($services as $service) {
            array_push($services_id, Service::service_classname($service));
            self::create(array(
                'type' => 'results',
                'detail' => 'La campagne '.$campaign->name.' est terminée. Pensez à mettre à jour vos indicateurs.',
                'service_id' => Service::service_classname($service),
                'campaign_id' => $campaign->id
            ));
        }

        return $services_id;
    }


    public static function send_service_notification($services)
    {
        if (count($services)) {
            foreach ($services as $service_id) {
                $service = Service::findOrFail($service_id);
                Mail::send('emails.service-notification', compact('service'), function ($m) use ($service) {
                    $users = User::whereServicesId($service->id)->whereDelete(0)->pluck('email')->toArray();
                    $m->from(Parameter::getParameter('expeditor','common'), Parameter::getParameter('expeditor_name','common'));
                    $m->to($users)->subject( 'De nouvelles notifications sur CAMP' );
                });
            }
        }
    }

    public static function lists($user)
    {
        return array(
            'services' => self::lists_service($user),
            'count' => self::count_service($user)
        );
    }

    public static function lists_service($user)
    {
        return self::whereServiceId($user->services_id)->whereDone(0)->get();
    }

    public static function count_service($user)
    {
        $last_view_notification = $user->notification == null ? '0000-00-00' : $user->notification;
        return self::whereServiceId($user->services_id)->whereDone(0)->where('created_at','>',$last_view_notification)->count();
    }



    // 1 to 1
    public function campaign() {
        return $this->belongsTo('App\Campaign');
    }

}
