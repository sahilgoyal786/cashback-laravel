<?php namespace cashback;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    //

    protected $dates = ['expiry_date'];
    protected $table = 'offers';

    protected $fillable = ['name', 'category_id', 'link', 'expiry_date', 'featured','description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('cashback\Category', 'category_id');
    }

    public function scopeFeatured($query)
    {
        return $query->where('offers.featured', '1')->get();
    }

    public function scopeExpired($query)
    {
        return $query->where('offers.expiry_date', '<',Carbon::now())->get();
    }
    public function scopeActive($query)
    {
        return $query->where('offers.expiry_date', '>=',Carbon::now())->get();
    }

}
