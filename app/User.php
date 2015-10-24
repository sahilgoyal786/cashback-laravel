<?php namespace cashback;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'mobile_no', 'password','user_type','g-recaptcha-response'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


    public function payment_setting(){
        return $this->hasOne('cashback\PaymentSetting');
    }

    public function transactions(){
        return $this->hasMany('cashback\Transaction');
    }

    /**
     * @return int
     */
    public function isAdmin(){
        return !strcmp($this->user_type,'admin');
    }


    public static function findByEmailOrFail(
        $email,
        $columns = array('*')
    ) {
        if ( ! is_null($user = static::whereEmail($email)->first($columns))) {
            return $user;
        }

        return false;
    }
    
    public function getAccountStatistics(){
        $account_statistics = array();
        $transactions = Transaction::all();
        $account_statistics['total'] = $transactions->where('type','cashback')->sum('amount');
        $account_statistics['confirmed'] = $transactions->where('type','cashback')->where('status','Confirmed')->sum('amount');
        $account_statistics['pending'] = $transactions->where('type','cashback')->where('status','Pending')->sum('amount');
        $account_statistics['paid'] = $transactions->where('type','payment')->sum('amount');
        $account_statistics['balance'] = $account_statistics['confirmed'] - $account_statistics['paid'];
        return $account_statistics;
    }

}
