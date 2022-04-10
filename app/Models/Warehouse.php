<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
