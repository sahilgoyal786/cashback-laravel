<?php namespace cashback\Http\Controllers\Auth;

use cashback\Http\Requests;
use cashback\Http\Controllers\Controller;

use cashback\User;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Registrar;

class FacebookAuthController extends Controller
{

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @param Guard $auth
     * @param Registrar $registrar
     * @return Response
     */
    public function handleProviderCallback(Guard $auth, Registrar $registrar)
    {
        $user = Socialite::driver('facebook')->user();


        $details = array();

        $found_user = User::findByEmailOrFail($user->getEmail());
        if ($found_user) {
            $auth->loginUsingId($found_user->id);
            return redirect()->intended('/home');

        } else {

            $details['name'] = $user->getName();
            $details['email'] = $user->getEmail();
            $details['user_type'] = 'normal';
            $details['mobile_no'] = '';
            $details['password'] = bcrypt(str_random(8));


            $auth->login($registrar->create($details));
            Session::flash('status','You have successfully logged in via Facebook.');
            return redirect()->intended('/home');
        }

        return 'Success';


    }

}
