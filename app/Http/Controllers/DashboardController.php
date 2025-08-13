<?php

namespace App\Http\Controllers;

use App\Models\WaitingList;
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
        $this->dashboardService->addCustomer($request->all());

        return redirect()->back()->with('success', 'Customer added to waiting list!');
        //dd($request->all());
    }


    public function notify($id)
    {
        $result = $this->dashboardService->notifyCustomer($id);

        //check
        if (isset($result['error'])){
            return redirect()->back()->with('error', 'It did not work');
        }

        //redirect
        return redirect()->back()->with('success', 'It worked');
    }


    public function history()
    {
        $history = $this->dashboardService->customerHistory();

        return view('business/history', compact('history'));
    }

    public function delete($id)
    {
        $waitingList = WaitingList::find($id);

//        if (!$waitingList || $waitingList->user_id !== auth()->user() ) {
//            return redirect()->back()->with('error', 'not found');
//        }

        if (!$waitingList){
            return redirect()->back()->with('error', 'not found');
        }

        $waitingList->delete();

        return redirect()->back()->with('success', 'Deleted');
    }




}
