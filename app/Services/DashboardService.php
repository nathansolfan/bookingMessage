<?php

namespace App\Services;

class DashboardService
{
    //
    public function getWaitingList()
    {
        $user = auth()->user();
        //relationship
        $waitingList = $user->waitingLists()->get();
        return $waitingList;
    }

}
