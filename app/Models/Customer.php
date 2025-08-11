<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable = [
        'name',
        'phone',
        'user_id',
    ];





    //customer BELONGSTO an User and HASMANY WaitlingLists
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function waitingLists()
    {
        return $this->hasMany(WaitingList::class);
    }

}
