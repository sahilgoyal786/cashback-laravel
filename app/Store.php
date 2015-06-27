<?php namespace cashback;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    //
    protected $table = 'stores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'image', 'description', 'featured', 'slug' ,'link' , 'max_cashback'];


    public function scopeOrdered($query)
    {
        return $query->orderBy('name', 'asc')->get();
    }


    public function scopeFeatured($query)
    {
        return $query->where('featured', '1')->get();
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug' ,$slug);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getCategories()
    {
        return $this->hasMany('cashback\Category', 'store_id', 'id');
    }
}
