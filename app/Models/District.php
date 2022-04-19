<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class District extends Model{
    public $timestamps = false;
    protected $fillable = [
        'name', 'type', 'city_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'devvn_district';
}