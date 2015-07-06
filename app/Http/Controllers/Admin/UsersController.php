<?php namespace cashback\Http\Controllers\Admin;

use cashback\Http\Requests;
use cashback\Http\Controllers\Controller;
use cashback\Transaction;
use cashback\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller {



    /**
     *Checks if the user is logged in or not
     *
     */
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
		//

        $users = User::paginate(25);
        return view('admin.users.all')->with('users',$users);

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function view($id)
	{
        $user = User::find($id);


        return view('admin.users.view')
            ->with('account',$user->getAccountStatistics())
            ->with('transactions',$user->transactions()->get())
            ->with('payment_setting',$user->payment_setting()->first())
            ->with('user',$user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

        $user = User::find($id);
        return view('admin.users.edit')->with('user',$user);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
	public function update($id,Request $request)
	{
        $user = User::find($id);
        $user->update($request->all());
        return redirect('admin/users');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
        User::destroy($id);
        return redirect('admin/users');
	}

}
