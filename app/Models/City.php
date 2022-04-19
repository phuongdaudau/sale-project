<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class City extends Model{
    public $timestamps = false;
    protected $fillable = [
        'name', 'type'
    ];
    protected $primaryKey = 'id';
    protected $table = 'devvn_city';

}