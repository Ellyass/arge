<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
   protected $guarded = [];
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
       return $this->belongsTo('App\Models\Customer');
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
       return $this->hasMany('App\Models\OfferFile');
   }

   public function user()
   {
       return $this->belongsTo('App\Models\User');
   }

   protected $dates = ['offer_date'];

   public function target()
   {
       return $this->belongsTo('App\Models\Target','target_seller','target_seller_id');
   }

   public function tproduct()
   {
       return $this->hasOne('App\Models\Product','id','product');
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


}
