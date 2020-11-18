<?php

namespace App\Http\Controllers;
use App\Services\ChartService;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $membresChart=ChartService::getMembreGenderChart();
        $subscriptionsChart=ChartService::getSubscriptionsChart();
        return view('welcome',[
             'membresChart'=>$membresChart,
            'subscriptionsChart'=>$subscriptionsChart,
        ]);
    }
}
