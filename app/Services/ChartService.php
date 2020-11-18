<?php

namespace App\Services;

use App\Charts\MembreChart;
use App\Charts\SubscriptionChart;
use App\Models\Member;
use App\Models\Subscription;

class ChartService
{

    public static function getSubscriptionsChart()
    {
        $subscriptions = Subscription::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');

        $subscriptionsChart = new SubscriptionChart();
        $subscriptionsChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $subscriptionsChart->dataset('New Membre Register chartMembre', 'line', $subscriptions)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);
        return $subscriptionsChart;
    }

    public static function getMembreGenderChart()
    {
        $membres = Member::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("gender"))
            ->pluck('count');

        $membresChart = new MembreChart();
        $membresChart->labels(['homme', 'femme']);
        $membresChart->dataset('New Membre Register chartMembre', 'pie' /*'line'*/, $membres)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);
        return $membresChart;
    }
}
