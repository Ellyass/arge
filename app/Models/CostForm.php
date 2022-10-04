<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostForm extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'cost_forms';
    protected $dates = ['date'];
}
