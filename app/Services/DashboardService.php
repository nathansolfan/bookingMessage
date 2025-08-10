<?php

namespace App\Services;

class DashboardService
{
    //
    public function waitingList()
    {
        $user = auth()->user();

        //relationship
        $waitingList = $user->waitingLists()->get();

        return $waitingList;

    }

}
