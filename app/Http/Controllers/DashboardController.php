<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected $dashboardService;
    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        //get data from service
        $waitingList = $this->dashboardService->getWaitingList();
        return view('dashboard', compact('waitingList'));

    }

    public function addToWaitingList(Request $request)
    {
        dd($request->all());
        //data from form
        //service to add customer
        //redirect

    }
}
