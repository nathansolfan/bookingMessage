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

    public function addCustomer(array $data)
    {
        //get logged user
        //find customer on table
        //create
        //relation everything

    }

}
