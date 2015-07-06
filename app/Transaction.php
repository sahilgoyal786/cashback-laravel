<?php namespace cashback;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The attributes to be treated as Carbon(date-time) instance.
     *
     * @var array
     */
    protected $dates = ['date', 'confirmation_date'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'transaction_id', 'status', 'retailer', 'type', 'amount', 'date', 'confirmation_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Return the user of the transaction.
     */
    public function user()
    {
        return $this->belongsTo('cashback\User');
    }

    public function scopeOrdered($query){
        return $query->orderBy('date', 'desc');
    }
}
