<?php namespace cashback;

use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payment_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['address', 'bank_name', 'account_no', 'ifsc_code' ,'user_id','branch_name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = ['password', 'remember_token'];

    public function user()
    {
        return $this->belongsTo('casback\User');
    }

}
