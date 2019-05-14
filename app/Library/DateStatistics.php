<?php
/**
 * Created by PhpStorm.
 * User: gaellevant
 * Date: 14/05/2019
 * Time: 15:06
 */

namespace App\Library;


use Carbon\Carbon;

class DateStatistics
{

    private $begin = null;

    private $end = null;

    private $window = 6;

    private $beginWindow = null;

    private $endWindow = null;

    private $dateInterval = 0;


    public function __construct($dates)
    {
        $this->begin    = Carbon::createFromFormat('d/m/Y',$dates['begin']);
        $this->end      = Carbon::createFromFormat('d/m/Y',$dates['end']);
        $this->monthInterval();
        $this->defineInterval();
    }

    private function monthInterval()
    {
        $this->dateInterval = $this->begin->diffInMonths($this->end);
    }

    private function defineInterval()
    {
        // >= 12 mois
        if ($this->dateInterval >= 12) {
            $this->endWindow = $this->end->endOfMonth()->format('d/m/Y');
            $this->beginWindow = $this->end->subYear()->startOfMonth()->format('d/m/Y');
        }
        // > interval
        elseif ($this->dateInterval > $this->window) {
            $this->endWindow = $this->end->endOfMonth()->format('d/m/Y');
            $this->beginWindow = $this->begin->startOfMonth()->format('d/m/Y');
        }
        // <= interval
        else {
            $monthsAfter = $this->end->diffInMonths(Carbon::now()) > 3 ? 3 : $this->end->diffInMonths(Carbon::now());
            $monthsBefore = $this->window-$monthsAfter;
            $this->endWindow = $this->end->addMonths($monthsAfter)->endOfMonth()->format('d/m/Y');
            $this->beginWindow = $this->begin->subMonths($monthsBefore)->startOfMonth()->format('d/m/Y');
        }
    }

    public function monthsList()
    {
        $months = array();
        $lastEnd = null;
        $i = 0;

        while ($lastEnd != $this->endWindow) {
            $begin  = Carbon::createFromFormat('d/m/Y',$this->beginWindow);
            $lastBegin = $begin->addMonths($i)->startOfMonth()->format('d/m/Y');
            $lastEnd = $begin->endOfMonth()->format('d/m/Y');
            $name = $begin->endOfMonth()->format('M Y');
            $months[] = array(
                'begin' => $lastBegin,
                'end' => $lastEnd,
                'name' => $name
            );
            $i++;
        }
        return $months;
    }

}