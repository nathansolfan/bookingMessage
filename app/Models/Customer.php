<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //customer BELONGSTO an User and HASMANY WaitlingLists
    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function waitingLists()
    {
        $this->hasMany(WaitingList::class);
    }

}
