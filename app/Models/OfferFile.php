<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferFile extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
      'offer_id',
      'customer_id',
      'offer_file'
    ];

}
