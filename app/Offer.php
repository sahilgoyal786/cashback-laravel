<?php namespace cashback;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    //

    protected $dates = ['expiry_date'];
    protected $table = 'offers';

    protected $fillable = ['name', 'category_id', 'link', 'expiry_date', 'featured', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('cashback\Category', 'category_id');
    }

    public function scopeFeatured($query)
    {
        return $query->where('offers.featured', '1');
    }

    public function scopeExpired($query)
    {
        return $query->where('offers.expiry_date', '<', Carbon::now())->get();
    }

    public function scopeActive($query)
    {
        return $query->where('offers.expiry_date', '>=', Carbon::now())->get();
    }


    public static function featuredOffers()
    {
        return Offer::join('categories', 'offers.category_id', '=', 'categories.id')
            ->join('stores', 'stores.id', '=', 'categories.store_id')
            ->select('stores.name as store', 'stores.image as store_image', 'categories.name as category',
                'categories.cashback as cashback', 'offers.id as id', 'stores.slug as slug',
                'offers.name as name', 'offers.link', 'offers.description as description', 'offers.expiry_date')
            ->orderBy('stores.name', 'asc')
            ->featured()->active();

    }

}
