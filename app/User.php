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
	protected $fillable = ['name', 'email', 'mobile_no', 'password','user_type'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


    public function payment_setting(){
        return $this->hasOne('cashback\PaymentSetting');
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

}
