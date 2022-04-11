<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order')->withTimestamps();
    }
    public function warehouse()
    {
        return $this->belongsTo('App\Models\Warehouse');
    }
    public function favorite_to_users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
    public function scopeApproved($query)
    {
        return $query->where('is_approved', 1);
    }
    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }

}
