<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallExplanation extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['offer_id','customer_id','call_explanation'];
}
