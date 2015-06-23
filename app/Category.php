<?php namespace cashback;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    //
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'cashback', 'store_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getStore(){
        return $this->belongsTo('cashback\Store','store_id')->first();
    }
    public function getOffers(){
        return $this->hasMany('cashback\Offer','offer_id','id')->get();
    }


}
