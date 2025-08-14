<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\WaitingList;

class DashboardService
{
    //
    public function getWaitingList()
    {
        $user = auth()->user();
        //relationship - get all
//        $waitingList = $user->waitingLists()->get();
        $waitingList = $user->waitingLists()->where('status', 'waiting')->get();
        return $waitingList;
    }

    public function addCustomer(array $data)
    {
        //get logged user

        $user = auth()->user();

        //find Customer on the model
        $customer = Customer::create([
            'phone' => $data['phone'],
            'user_id' => $user->id,
            'name' => $data['name']
        ]);

        $waitingList = WaitingList::create([
            'user_id' => $user->id,
            'customer_id' => $customer->id,
            'service' => $data['service'],
            'status' => 'waiting'
        ]);
        //create
        //relation everything

    }

    public function notifyCustomer($id)
    {
        $model = WaitingList::find($id);
        if (!$model){
            return ['error' => 'Could not find'];
        }

        //find waiting_list
        $notified = $model->update(['status' => 'notified']);
        if (!$notified){
            return ['error' => 'Did not work'];
        }

        $whatsapp = new WhatsappService();
        //sendNoti from whataappservice
        $whatsapp->sendNotification(
            $model->customer->name,
            $model->customer->phone,
            $model->service
        );

        return $notified;
    }


    public function customerHistory()
    {
        //logged
        $user = auth()->user();

        $notified = $user->waitingLists()
            ->where('status', 'notified')
            ->with('customer')
            ->orderBy('updated_at', 'asc')
            ->get();

        return $notified;
    }




}
