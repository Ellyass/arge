<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $dates = ['offer_save_date'];
    public $timestamps = false;
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','customer_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','offer_created_user', 'id');
    }
}
