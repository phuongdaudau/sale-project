<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model{
    public $timestamps = false;
    protected $fillable = [
        'name', 'type', 'district_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'devvn_commune';
}