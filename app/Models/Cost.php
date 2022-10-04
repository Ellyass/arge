<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CostForm;
use App\Models\Users;


class Cost extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $dates = [
        'date'
    ];

    public function user()
    {
        return $this->hasMany('App\Models\Users');
    }

    public function  cost_from()
    {
        return $this->belongsTo('App\Models\CostForm');
    }

}
