<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $dates = [
        'date'
    ];
    public function target_seller()
    {
        return $this->belongsTo('App\Model\TargetSeller');
    }
    public function offer()
    {
        return $this->belongsTo('App\Model\Target', 'target_seller_id', 'target_seller_id');

    }
}
