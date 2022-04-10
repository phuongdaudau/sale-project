<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('quantity');
    }
    public function warehouse()
    {
        return $this->belongsTo('App\Models\Warehouse');
    }
    public function ship() 
    {
        return $this->hasOne('App\Models\Ship');
    }
}

// avatar cos khoa ngoai user_id
// ship co khoa ngoai order_id
