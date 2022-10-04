<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $guarded = [];
    protected $dates = ['offer_date'];
    public $timestamps = false;

    protected $fillable = [
        'customer_id',
        'user_id',
        'target_seller_id',
        'offer_money',
        'offer_total',
        'offer_date',
        'product',
        'offer_status',
        'kdv',
        'accept_type',
    ];


    public function customer()
    {
        return $this->hasOne('App\Models\Customer','id','customer_id');
    }

    public function customer_emails()
    {
        return $this->belongsTo('App\Models\CustomerEmail', 'customer_id', 'customer_id');
    }

    public function explanation()
    {
        return $this->hasOne('App\Models\Explanation', 'offer_id', 'id');
    }

    public function explanations()
    {
        return $this->hasMany('App\Models\Explanation');
    }

    public function email()
    {
        return $this->belongsTo('App\Models\CustomerEmail');
    }

    public function files()
    {
        return $this->hasMany('App\Models\OfferFile','offer_id','id');
    }

    public function pdfs()
    {
        return $this->hasOne('App\Models\OfferPdf','offer_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Users');
    }

    public function target()
    {
        return $this->belongsTo('App\Models\Target', 'target_seller', 'target_seller_id');
    }

    public function products()
    {
        return $this->hasOne(Product::class, 'id', 'product');
    }

    public function tproduct()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product');
    }

    public function seller()
    {
        return $this->belongsTo('App\Models\TargetSeller', 'target_seller_id', 'id');
    }

    public function getProduct()
    {
        $product = Product::where('id', $this->product)->first();
        if ($product) {
            return $product->name;
        }
        return null;
    }

    public function agreement()
    {
        return $this->hasMany('App\Models\OfferPdf');
    }


}
