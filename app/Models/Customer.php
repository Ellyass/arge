<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer_types()
    {
        return $this->hasMany('App\Models\CustomerType');
    }

    public function customerEmails()
    {
        return $this->hasOne('App\Models\CustomerEmail', 'customer_id', 'id');
    }
    public function emails()
    {
        return $this->hasMany('App\Models\CustomerEmail');
    }
}
