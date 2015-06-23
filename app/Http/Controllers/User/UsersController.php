<?php namespace cashback\Http\Controllers\User;

use cashback\Http\Requests;
use cashback\Http\Controllers\Controller;

use cashback\PaymentSetting;
use cashback\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('user.index')->with('user', \Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(Request $request)
    {
        //
        $this->validate($request, ["name" => "required", "email" => "required|email", "mobile_no" => "required|digits:10"]);
        $user = User::findOrFail(\Auth::user()->id);


        Session::flash('status','Your profile settings have been updated.');
        $user->update($request->all());
        return redirect('user/account');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *
     */
    public function payment_settings()
    {
        $user = \Auth::user();
        if ($user->payment_setting) {
            $settings = $user->payment_setting()->first();
        } else {
            $settings = new PaymentSetting();
        }


        return view('user.payment_settings')->with('settings', $settings);
    }


    public function add_payment_settings(Request $request)
    {


        $this->validate($request, ["address" => "required", "bank_name" => "required", "branch_name" => "required", "account_no" => "required"
            , "ifsc_code" => "required"]);

        $request['user_id'] = \Auth::user()->id;
//        return $request->all();
        if (!PaymentSetting::query("user_id", '=', \Auth::user()->id)->get()->count()) {
            PaymentSetting::create($request->all());
            Session::flash('status','Your payment settings have been added.');
        } else {
            PaymentSetting::query("user_id", '=', \Auth::user()->id)->update($request->except(['_token','_method']));
            Session::flash('status','Your payment settings have been updated.');
        }
        $settings = PaymentSetting::query("user_id", '=', \Auth::user()->id)->first();
        return view('user.payment_settings')->with('settings', $settings);
    }


    public function password(){

        return view('user.password');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\View\View
     */
    public function update_password(Request $request)
    {
        $this->validate($request, ["old_password" => "required|min:6", "password" => "required|min:6|confirmed"]);

        $old = $request->get('old_password');
        $new = $request->get('password');

//        return \Auth::user()->id;
        $userdata = array(
            'id' => \Auth::user()->id,
            'password' => $old
        );
        // doing login.
        if (Auth::validate($userdata)) {
            if (Auth::attempt($userdata)) {
                //Session::flash('success', 'Successfully changed your password.');

                $user = \Auth::user();
                $user->password = bcrypt($new);
                $user->update();

                Session::flash('status','You have successfully changed your password.');
                return view('user.password');
            }
        }
        else {
            // if any error send back with message.
//            Session::flash('error', 'Something went wrong');

            return view('user.password')->withErrors(["msg"=>"The old password was incorrect."]);
        }

    }

}
