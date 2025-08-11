<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaitingList extends Model
{


    protected $fillable = [
        'user_id',
        'customer_id',
        'service',
        'status'
    ];

    //belongsTO an User and BelongsTO a Customer
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
