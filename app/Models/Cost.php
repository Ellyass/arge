<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CostFrom;
use App\Models\User;


class Cost extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $dates = [
        'date'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function  cost_from()
    {
        return $this->belongsTo('App\Models\CostFrom');
    }
}
